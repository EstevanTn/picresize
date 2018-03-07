<?php
namespace Tunaqui\PicResize\Exception;

use Exception;
use Tunaqui\Utils\Strings;

class PictureSaveException extends Exception {

    var $urlFile;
    var $saveDir;

    public function __construct($urlFile, $saveDir, Throwable $previous = null)
    {
        $this->urlFile = $urlFile;
        $this->saveDir = $saveDir;
        parent::__construct(Strings::placeholder('An error occurred while trying to save the image <span style=\'font-weight: bold;\'>{0}</span> in the directory <span style=\'font-weight: bold;\'>{1}</span>.', $urlFile, $saveDir), 500, $previous);
    }
}
