<?php
namespace Tunaqui\PicResize;

class ExampleTest extends \PHPUnit\Framework\TestCase
{

    /**
     * Test that true does in fact equal true
     */
    public function testTrueIsTrue()
    {
        require '../src/Picture.php';
        require '../src/PictureResize.php';
        require '../vendor/autoload.php';
        $img = new \Tunaqui\PicResize\PictureResize('../download/logo.png');
        $img->thumbnail(100);
        //$img->saveNewSize();
        $img->show();
        $this->assertTrue(true);
    }

}
