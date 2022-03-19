<?php
namespace RestCord\Traits;
use RestCord\Constants;
trait BannerTrait   {
    public function getBanner($format = 'webp', $size = null) {
        if($this->banner)   {
            if(strpos($this->banner, 'a_') === 0) {
                $format = 'gif';
            }
            $url = Constants::BANNER_URL.$this->id.'/'.$this->banner.'.'.$format;
            if($size !== null) {
                $url .= '?size='.$size;
            }
        }
    }
}