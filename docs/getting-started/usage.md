---
title: Usage
weight: 3
---

## Usage

### Form field

The form field can be used with no options, by simply adding this to your Filament Form schema:

```php
use LaraZeus\FilamentLocationPickrField\Forms\Components\LocationPickr;
...

    ->schema([
        ...
        LocationPickr::make('location'),
        ....
    ]);
...
```

The name used in the `make()` function must be the one you set up as your model's column/computed location property.

### Full options

The full set of options is as follows. All option methods support closures, as well as direct values.

```php
use LaraZeus\FilamentLocationPickrField\Forms\Components\LocationPickr;
...

    ->schema([
        ...
        LocationPickr::make('location')
            ->mapControls([
                'mapTypeControl'    => true,
                'scaleControl'      => true,
                'streetViewControl' => true,
                'rotateControl'     => true,
                'fullscreenControl' => true,
                'zoomControl'       => false,
            ])
            ->defaultZoom(5)
            ->draggable()
            ->clickable()
            ->height('40vh')
            ->defaultLocation([41.32836109345274, 19.818383186960773])
            ->myLocationButtonLabel('My location'),
        ....
    ]);
...
```

### Infolist entry

The infolist entry can be used with no options, by simply adding this to your Filament Infolist schema:

```php
use LaraZeus\FilamentLocationPickrField\Infolists\Components\LocationPickr;
...

    ->schema([
        ...
        LocationPickr::make('location'),
        ....
    ]);
...
```

The name used in the `make()` function must be the one you set up as your model's column/computed location property. The components accepts options like `defaultZoom`, `defaultLocation` and `height`.

