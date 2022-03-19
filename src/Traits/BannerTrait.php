<?php
namespace RestCord\Traits;
use RestCord\Constants;
trait BannerTrait   {
    public function getBanner($format = 'webp', $size = null) {
        // Add const BANNER_URL = self::CDN_URL.'banners/'; to the Constants.php and change it to $url = Constants::CDN_URL.'banners/'.($this->discriminator % 5).'.png';
        $url = "https://cdn.discordapp.com/banners/".($this->discriminator % 5).'.png';
        if($this->banner)   {
            if(strpos($this->banner, 'a_') === 0) {
                $format = 'gif';
            }
            $url = "https://cdn.discordapp.com/banners/".$this->id.'/'.$this->banner.'.'.$format;
            if($size !== null) {
                $url .= '?size='.$size;
            }
        }
    }
}