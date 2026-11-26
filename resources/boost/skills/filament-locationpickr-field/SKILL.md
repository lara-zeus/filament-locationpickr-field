---
name: zeus-filament-locationpickr-field
description: Use when adding a Google Maps coordinate picker field in Filament forms or displaying a map in infolists with lara-zeus/filament-locationpickr-field.
---

# Lara Zeus LocationPickr Field

## Overview & Requirements
`lara-zeus/filament-locationpickr-field` provides Google Maps location picker support for Filament Forms and read-only map rendering for Filament Infolists.
- **PHP**: `^8.1`
- **Filament Forms**: `^5.0`
- **Dependencies**: `spatie/laravel-package-tools ^1.13.5`
- **Package Name**: `lara-zeus/filament-locationpickr-field` (Service Provider: `LaraZeus\FilamentLocationPickrField\LocationPickrFieldServiceProvider`)

## Installation
```bash
composer require lara-zeus/filament-locationpickr-field
php artisan filament:assets
```

Add your Google Maps JavaScript API key to `.env`:
```env
GMAP_API=your_map_api_key_here
```

## Configuration & Migrations
Publish the config file (and optionally views):
```bash
php artisan vendor:publish --tag=filament-locationpickr-field-config
php artisan vendor:publish --tag=filament-locationpickr-field-views
```

Config keys in `config/filament-locationpickr-field.php`:
`key`, `default_location` (`['lat' => ..., 'lng' => ...]`), `default_zoom` (`8`), `default_draggable` (`true`), `default_clickable` (`true`), `default_height` (`'400px'`), `my_location_button` (`'My location'`).

Add a JSON column to your model's migration and `$fillable` (or define a computed `location(): Attribute` accessor/mutator over separate `lat` and `lng` columns):
```php
$table->json('location')->nullable();
```

If using Tailwind v4 custom themes, include the package views in your CSS:
```css
@source "../../vendor/lara-zeus/filament-locationpickr-field/resources/views/**/*.blade.php";
```

## Filament Panel Registration
No panel plugin registration is required. Use `LocationPickr` directly in Forms and Infolists.

## Core Usage & Examples

### Form Field (`LaraZeus\FilamentLocationPickrField\Forms\Components\LocationPickr`)
```php
use LaraZeus\FilamentLocationPickrField\Forms\Components\LocationPickr;

LocationPickr::make('location')
    ->mapControls([
        'mapTypeControl' => true,
        'scaleControl' => true,
        'streetViewControl' => true,
        'rotateControl' => true,
        'fullscreenControl' => true,
        'zoomControl' => false,
    ])
    ->defaultZoom(5)
    ->draggable()
    ->clickable()
    ->height('40vh')
    ->defaultLocation([41.32836109345274, 19.818383186960773])
    ->myLocationButtonLabel('My location');
```

### Infolist Entry (`LaraZeus\FilamentLocationPickrField\Infolists\Components\LocationPickr`)
```php
use LaraZeus\FilamentLocationPickrField\Infolists\Components\LocationPickr;

LocationPickr::make('location')
    ->defaultZoom(10)
    ->height('300px')
    ->defaultLocation(['lat' => 41.32836109345274, 'lng' => 19.818383186960773]);
```

## Common Pitfalls / Anti-Patterns
- **Expecting `default_clickable` config to enable clicking**: `Forms\Components\LocationPickr` sets `$clickable = false` directly on the property, so `getClickable()` never falls back to `config('filament-locationpickr-field.default_clickable')`; chain `->clickable()` on the field.
- **String coordinates in `Infolists\Components\LocationPickr::defaultLocation()`**: Pass `['lat' => float, 'lng' => float]` or numeric floats `[lat, lng]`; passing numeric strings in an indexed array triggers an undefined `$precision` property access on the Infolist component.
- **Missing `GMAP_API` or `filament:assets`**: Maps will fail to initialize if the API key is empty or the `locationpickr-field` / `locationpickr-entry` Alpine assets are not published.
