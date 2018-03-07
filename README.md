# picresize

PicResize a small library that allows you to download images from a URL, store them and resize them.

## Installation

Via Composer

``` bash
$ composer require tunaqui/picresize
```

Install vendor

``` bash
$ composer install
```

## Usage

Download an image from a URL and store it in a directory.
``` php
$image = new \Tunaqui\PicResize\Picture();
$image->download('http://nisleen.com/images/logo.png');
$image->save('../download/');
```

Download an image from a URL, store it in a directory and resize.
``` php
$image = new \Tunaqui\PicResize\PictureResize('http://nisleen.com/images/logo.png', '../download/');
$image->resize(150, 150);
echo $image->response();
```

Create a thumbnail.
``` php
$img = new \Tunaqui\PicResize\PictureResize('../download/logo.png');
$img->thumbnail(100);
$img->show();
```

Create a thumbnail and save.
``` php
$img = new \Tunaqui\PicResize\PictureResize('../download/logo.png');
$img->thumbnail(100);
$img->saveNewSize();
```

## Credits

- [EstevanTn](https://gitlab.com/EstevanTn)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/tunaqui/picresize.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/tunaqui/picresize/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/tunaqui/picresize.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/tunaqui/picresize.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/tunaqui/picresize.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/tunaqui/picresize
[link-travis]: https://travis-ci.org/tunaqui/picresize
[link-scrutinizer]: https://scrutinizer-ci.com/g/tunaqui/picresize/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/tunaqui/picresize
[link-downloads]: https://packagist.org/packages/tunaqui/picresize
[link-author]: https://github.com/EstevanTn
