<?php
namespace Tunaqui\PicResize;

use Exception;
use Tunaqui\PicResize\Exception\PictureSaveException;
use Tunaqui\PicResize\Exception\PictureDownloadException;
use Tunaqui\Utils\Strings;
use Tunaqui\Utils\Objects;

class Picture {

    var $fileInfo;
    var $urlFilename;
    var $saveDirname;
    var $saveFilename;
    var $fileContent;

    public function download($urlFilename) 
    {
        try {
            $this->urlFilename = $urlFilename;
            $this->fileInfo = Objects::fromArray(pathinfo($urlFilename));
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_POST, 0);
            curl_setopt($curl, CURLOPT_URL, $urlFilename);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $this->fileContent = curl_exec($curl);
            curl_close($curl);
            return true;
        } catch(Exception $ex) {
            throw new PictureDownloadException($this->urlFilename, $ex);            
        }
    }

    public function save($saveDir='../download/') 
    {
        try {
            if(!file_exists($saveDir)) {
                mkdir($saveDir, 0777, true);
            }
            $this->saveDirname = $saveDir;
            $this->saveFilename = Strings::placeholder('{0}{1}', $this->saveDirname, $this->fileInfo->basename);
            $downloadFile = fopen($this->saveFilename, 'wb');
            fwrite($downloadFile, $this->fileContent);
            fclose($downloadFile);
            return true;
        } catch(Exception $ex) {
            throw new PictureSaveException($this->urlFilename, $this->saveDirname, $ex);
        }
    }
    
    public function info() 
    {
        return $this->fileInfo;
    }

}