<?php
////////////////////////////////////////////////////
//  Author: Kirihito                              //
///////////////////////////////////////////////////

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