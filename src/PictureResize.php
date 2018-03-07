<?php
namespace Tunaqui\PicResize;

use Intervention\Image\ImageManagerStatic as Image;

class PictureResize extends Picture {

    var $image;
    var $external;
    var $result;

    public function __construct($urlFilename, $saveDir='../download/')
    {
        $urlInfo = parse_url($urlFilename);
        $this->external = !empty($urlInfo['scheme']) && ($urlInfo['scheme'] === 'http' || $urlInfo['scheme'] === 'https');
        if($this->external) {
            $this->download($urlFilename);
            $this->save($saveDir);
        } else {
            $this->saveFilename = $urlFilename;
        }
        $this->image = Image::make($this->saveFilename);
        $this->result = $this->image;
    }

    public function resize($w, $h) {
        $this->result = $this->image->resize($w, $h);
    }

    public function autoSize($w, $h=null, $upsize=false) {
        $this->result = $this->image->resize($w, $h, function($constraint) {
            $constraint->aspectRatio();
            if($upsize) {
                $constraint->upsize();
            }
        });
    }

    public function thumbnail($size = 48) {
        $this->resize($size, $size);
    }

    public function response() {
        return $this->result->response();
    }

    public function show() {
        echo($this->response());
    }

}
