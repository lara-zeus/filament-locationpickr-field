---
title: Installation
weight: 1
---

## Prerequisites

This package is built for Laravel and Filament.

## Installation

```bash
composer require lara-zeus/filament-locationpickr-field
```

Publish the config file:

```bash
php artisan vendor:publish --tag=filament-locationpickr-field-config
```

Optionally publish views:

```bash
php artisan vendor:publish --tag=filament-locationpickr-field-views
```

## Setting your Google Maps API Key

All use of the Google Maps API requires an API key. If you don't have one, refer to [Google's documentation](https://developers.google.com/maps/documentation/javascript/get-api-key).

Once you have a key, either add it to your .env file as:

```
GMAP_API=your_map_api_key_here
```

... 

or publish and edit the `filament-locationpickr-field.php` config file.


## Preparing the models

Add a `location` column to any model migration schema used for map data

```php
...

Schema::table('table_name', function (Blueprint $table) {
    $table->json('location')->nullable();
});

...
```

and add the column to the model fillable array

```php
...

protected $fillable = [
    ...
    'location',
];
```

If you have separate columns for `lat` and `lng` you can use a computed property on any model being used for map data and use a mutator which converts between separate lat and lng fields on your table, and a Google Point style array of 'lat' and 'lng' keys.

```php
...

protected $appends = [
    ...
    'location',
];

...

public function location(): Attribute
{
    return Attribute::make(
        get: fn ($value, $attributes) => json_encode([
            'lat' => (float) $attributes['lat'],
            'lng' => (float) $attributes['lng'],
        ]),
        set: fn ($value) => [
            'lat' => $value['lat'],
            'lng' => $value['lng'],
        ],
    );
}

...
```
