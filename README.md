# picresize

## Structure

If any of the following are applicable to your project, then the directory structure should follow industry best practices by being named the following.

```
bin/        
config/
src/
tests/
vendor/
```


## Install

Via Composer

``` bash
$ composer require tunaqui/picresize
```

## Usage

``` php
$img = new \Tunaqui\PicResize\PictureResize('http://nisleen.com/images/logo.png');
$img->thumbnail(100);
$img->show();
```

## Testing

``` bash
$ composer test
```

## Security

If you discover any security related issues, please email tumenaquiche@gmail.com instead of using the issue tracker.

## Credits

- [EstevanTn][link-author]

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
