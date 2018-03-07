<?php
namespace Tunaqui\PicResize;

use Intervention\Image\ImageManagerStatic as Image;
use Tunaqui\PicResize\Exception\PictureSaveException;
use Tunaqui\Utils\Strings;
use Tunaqui\Utils\Objects;

class PictureResize extends Picture {

    var $image;
    var $external;
    var $result;
    var $height;
    var $width;

    public function __construct($urlFilename, $saveDir='../download/', $rename = null)
    {
        $urlInfo = parse_url($urlFilename);
        $this->external = !empty($urlInfo['scheme']) && ($urlInfo['scheme'] === 'http' || $urlInfo['scheme'] === 'https');
        if($this->external) {
            $this->download($urlFilename);
            $this->save($saveDir, $rename);
        } else {
            $this->saveFilename = $urlFilename;
            $this->fileInfo = Objects::fromArray(pathinfo($this->saveFilename));
            $this->saveDirname = dirname($this->saveFilename).'/';
        }
        $this->image = Image::make($this->saveFilename);
        $this->result = $this->image;
    }

    public function resize($w, $h) {
        $this->width = $w;
        $this->height = $h;
        $this->result = $this->image->resize($w, $h);
    }

    public function autoSize($w, $h=null, $upsize=false) {
        $this->width = is_null($w) ? 'auto' : $w;
        $this->height = is_null($h) ? 'auto' : $h;
        $this->result = $this->image->resize($w, $h, function($constraint) use($upsize) {
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
        header(Strings::placeholder('Content-Type: image/{0}', $this->fileInfo->extension));
        $filename = Strings::placeholder('{0}_{1}x{2}.{3}', $this->fileInfo->filename, $this->width, $this->height, $this->fileInfo->extension);
        header(Strings::placeholder('Content-Disposition: inline; filename=\'{0}\'', $filename));
        header(Strings::placeholder('Content-Description: {0}', $filename));
        echo($this->response());
    }

    public function saveNewSize() {
        try {
            if(!file_exists($this->saveDirname)) {
                mkdir($this->saveDirname, 0777, true);
            }
            $this->saveFilename = Strings::placeholder('{0}{1}{2}x{3}.{4}', $this->saveDirname, $this->fileInfo->filename, $this->width, $this->height, $this->fileInfo->extension);
            $this->writeImage($this->saveFilename, $this->result->response());
            return true;
        } catch(Exception $ex) {
            throw new PictureSaveException($this->urlFilename, $this->saveDirname, $ex);
        }
    }

}
