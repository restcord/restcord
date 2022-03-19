<?php
////////////////////////////////////////////////////
//  Copyright by: Satowa Network                  //
//  Author: Kirihito                              //
//  Discord: https://discord.satowa-network.at    //
//  Email: support@satowa-network.at              //
//  Website: https://satowa-network.at            //
////////////////////////////////////////////////////

namespace RestCord\Traits;
use RestCord\Constants;

trait BannerTrait   {
    public function getBanner($format = 'webp', $size = null) {
        $url = Constants::CDN_URL.'banners/'.($this->discriminator % 5).'.png';
        if($this->avatar) {
            if(strpos($this->banner, 'a_') === 0) {
                $format = 'gif';
            }
            $url = Constants::BANNER_URL.$this->id.'/'.$this->banner.'.'.$format;
            if($size !== null) {
                $url .= '?size='.$size;
            }
        }
        return $url;
    }
}