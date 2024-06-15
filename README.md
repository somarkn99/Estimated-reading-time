
# Estimated Reading Time

[![Latest Version on Packagist](https://img.shields.io/packagist/v/somarkn99/estimated-reading-time.svg?style=flat-square)](https://packagist.org/packages/somarkn99/estimated-reading-time)
[![Total Downloads](https://img.shields.io/packagist/dt/somarkn99/estimated-reading-time.svg?style=flat-square)](https://packagist.org/packages/somarkn99/estimated-reading-time)

This package provides a simple way to calculate and display the estimated reading time for content in both Arabic and English. 

## Installation

You can install the package via composer:


```bash
composer require somarkn99/estimated-reading-time
```
[A Wordpress version of this package is available as a plugin here](https://wordpress.org/plugins/arabic-english-estimated-reading-time/)

## Usage

### Service Provider

Add the service provider to the `providers` array in `config/app.php`:

```php
'providers' => [
    // Other Service Providers
    Somarkn99\EstimatedReadingTime\EstimatedReadingTimeServiceProvider::class,
],
```

### Configuration

You can publish the configuration file using this command:

```bash
php artisan vendor:publish --provider="Somarkn99\EstimatedReadingTime\EstimatedReadingTimeServiceProvider" --tag="config"
```

This will publish the `estimatedreadingtime.php` configuration file to the `config` directory. 

### Blade Directive

You can use the Blade directive to display the estimated reading time in your views:

```blade
@readingtime($content, 'en')
```

Or for Arabic content:

```blade
@readingtime($content, 'ar')
```

### Directly Using the Main Class

You can directly call the `calculate` method from the `EstimatedReadingTime` class in your controllers, commands, or other parts of your application:

```php
use Somarkn99\EstimatedReadingTime\EstimatedReadingTime;

$readingTime = EstimatedReadingTime::calculate($content, 'en');
```

### API Usage

If you prefer to use an API to get the estimated reading time, you can use the provided endpoint.

#### Define the Route

Ensure the route is loaded by including it in your `routes/api.php`:

```php
Route::prefix('api')->group(function () {
    require base_path('vendor/somarkn99/estimated-reading-time/src/routes/api.php');
});
```

#### Make a Request

Send a `POST` request to `/api/reading-time` with the content and language in the request body.

**Request:**

```json
POST /api/reading-time
Content-Type: application/json

{
    "content": "Your article content goes here...",
    "lang": "en"
}
```

**Response:**

```json
{
    "reading_time": "Estimated Time of Reading: 3 Min"
}
```

### Configuration Options

You can customize the package by modifying the configuration options:

```php
return [
    'ar_prefix' => 'الوقت المقدر للقراءة: ',
    'ar_suffix_s' => 'دقيقة',
    'ar_suffix_p' => 'دقائق',
    'en_prefix' => 'Estimated Time of Reading: ',
    'en_suffix' => 'Min',
    'en_wpm' => 300,
    'ar_wpm' => 250,
    'exclude_images' => true,
];
```

## Security

If you discover any security-related issues, please email kesen.somar.99@gmail.com instead of using the issue tracker.

## Credits

- [Somar Kesen](https://github.com/somarkn99)
- [Abdoo Mayhob](https://abdoo.me)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
