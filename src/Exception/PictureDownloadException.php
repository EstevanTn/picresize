<?php
namespace Tunaqui\PicResize\Exception;

use Exception;
use Throwable;
use Tunaqui\Utils\Strings;

class PictureDownloadException extends Exception {

    var $urlFile;

    public function __construct($urlFile, Throwable $previous = null)
    {
        $this->urlFile = $urlFile;
        parent::__construct(Strings::placeholder('An error occurred while trying to download the image <span style=\'font-weight: bold;\'>{0}</span> ', $urlFile), 503, $previous);
    }
}
