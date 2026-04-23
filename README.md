# Filament LocationPickr Field

![](https://banners.beyondco.de/Filament%20LocationPickr%20Field.png?theme=light&packageManager=composer+require&packageName=lara-zeus%2Ffilament-locationpickr-field&pattern=architect&style=style_1&description=Just+a+simple+location+picker+field+for+Filament+Php+using+Google+Maps&md=1&showWatermark=0&fontSize=100px&images=location-marker)

This package provides just a simplified location picker field within [Filament](https://filamentphp.com) using Google Maps based on the excellent work of [Hugh Messenger](https://filamentphp.com/plugins/cheesegrits-google-maps).

## Installation

You can install the package into a Laravel app that uses [Filament](https://filamentphp.com) via composer::

```bash
composer require lara-zeus/filament-locationpickr-field
```

**Filament V3 & V2** - you can use https://github.com/arbermustafa/filament-locationpickr-field repository.

You can publish the config file with:

```bash
php artisan vendor:publish --tag=filament-locationpickr-field-config
```

The `config` file contains default global customization options for map rendering, like: api key, default location, etc.

Optionally, you can publish the view using:

```bash
php artisan vendor:publish --tag=filament-locationpickr-field-views
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

If you want to contribute to this package, you may want to test it in a real Filament project:

-   Fork this repository to your Github account.
-   Create a Filament app locally.
-   Clone your fork in your Filament app root directoy.
-   In the `/filament-locationpickr-field` directory, create a branch for your fix/improvement, e.g. `fix/pickr-field`.

Install the package in your app's `composer.json`:

```json
"require": {
    "lara-zeus/filament-locationpickr-field": "dev-fix/pickr-field as dev-main",
},
"repositories": [
    {
        "type": "path",
        "url": "./filament-locationpickr-field"
    }
]
```

Now run `composer update`.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [Lara Zeus](https://github.com/lara-zeus)
-   [Arber Mustafa](https://github.com/arbermustafa)
-   [Hugh Messenger](https://github.com/cheesegrits)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
