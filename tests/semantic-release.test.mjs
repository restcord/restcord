import assert from 'node:assert/strict';
import { appendFile, mkdtemp, mkdir, readFile, rm, writeFile } from 'node:fs/promises';
import { tmpdir } from 'node:os';
import { dirname, join } from 'node:path';
import { fileURLToPath, pathToFileURL } from 'node:url';
import { Writable } from 'node:stream';
import { execFile } from 'node:child_process';
import { promisify } from 'node:util';
import test from 'node:test';
import semanticRelease from 'semantic-release';

const run = promisify(execFile);
const projectRoot = dirname(dirname(fileURLToPath(import.meta.url)));
const packageJson = JSON.parse(await readFile(join(projectRoot, 'package.json'), 'utf8'));
const workflow = await readFile(join(projectRoot, '.github/workflows/ci.yml'), 'utf8');
const releaseConfig = {
    branches: ['develop'],
    tagFormat: '${version}',
    plugins: [
        '@semantic-release/commit-analyzer',
        '@semantic-release/release-notes-generator',
        [
            '@semantic-release/github',
            {
                successComment: false,
                failComment: false,
                releasedLabels: false,
            },
        ],
    ],
};
const analysisConfig = {
    ...releaseConfig,
    plugins: ['@semantic-release/commit-analyzer'],
};

test('semantic-release publishes tags and GitHub releases', () => {
    assert.deepEqual(packageJson.release, releaseConfig);
    assert.equal(packageJson.engines.node, '>=24.10.0 <25');
    assert.equal(packageJson.devDependencies['@openapitools/openapi-generator-cli'], '2.41.0');
    assert.match(packageJson.devDependencies['semantic-release'], /^\^25\./);
    assert.equal(packageJson.devDependencies['@semantic-release/commit-analyzer'], '^13.0.1');
    assert.match(workflow, /GITHUB_TOKEN: \$\{\{ github\.token \}\}/);
});

const releases = [
    ['ci commit', ['ci(release): configure automation'], false],
    ['fix commit', ['fix: correct response mapping'], '0.9.1'],
    ['feat commit', ['feat: add gateway endpoint'], '0.10.0'],
    ['breaking commit', ['feat: replace client surface', 'BREAKING CHANGE: remove the v6 resource surface'], '1.0.0'],
];

for (const [name, messages, expectedVersion] of releases) {
    test(`${name} maps to ${expectedVersion || 'no release'}`, async (t) => {
        const root = await mkdtemp(join(tmpdir(), 'restcord-semantic-release-'));
        t.after(() => rm(root, { recursive: true, force: true }));

        const repository = join(root, 'repository');
        const remote = join(root, 'remote.git');
        const environment = {
            CI: 'true',
            GITHUB_ACTIONS: 'true',
            GITHUB_EVENT_NAME: 'push',
            GITHUB_REF: 'refs/heads/develop',
            HOME: root,
            LANG: 'C.UTF-8',
            PATH: process.env.PATH,
        };
        const git = (...args) => run('git', args, {
            cwd: repository,
            encoding: 'utf8',
            env: environment,
        });

        await mkdir(repository);
        await run('git', ['init', '--bare', '--initial-branch=develop', remote], { env: environment });
        await run('git', ['init', '--initial-branch=develop', repository], { env: environment });
        await git('config', 'user.name', 'Release Test');
        await git('config', 'user.email', 'release-test@example.com');
        await writeFile(join(repository, 'fixture.txt'), '0.9.0\n');
        await git('add', 'fixture.txt');
        await git('commit', '-m', 'chore: seed release history');
        await git('tag', '0.9.0');
        await git('remote', 'add', 'origin', pathToFileURL(remote).href);
        await git('push', '--set-upstream', 'origin', 'develop');
        await git('push', 'origin', '0.9.0');
        await appendFile(join(repository, 'fixture.txt'), `${name}\n`);
        await git('add', 'fixture.txt');
        await git('commit', ...messages.flatMap((message) => ['-m', message]));

        let output = '';
        const sink = new Writable({
            write(_chunk, _encoding, callback) {
                output += _chunk.toString();
                callback();
            },
        });
        const result = await semanticRelease({
            ...analysisConfig,
            repositoryUrl: pathToFileURL(remote).href,
            dryRun: true,
            ci: false,
        }, {
            cwd: repository,
            env: environment,
            stdout: sink,
            stderr: sink,
        });

        if (expectedVersion === false) {
            assert.equal(result, false);
            return;
        }

        assert.ok(result && result.nextRelease, output);
        assert.equal(result.nextRelease.version, expectedVersion);
        assert.equal(result.nextRelease.gitTag, expectedVersion);
    });
}
