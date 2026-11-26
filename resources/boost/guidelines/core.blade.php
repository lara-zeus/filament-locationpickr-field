# Lara Zeus LocationPickr Field (`lara-zeus/filament-locationpickr-field`)

Google Maps location picker form field and read-only infolist map entry for FilamentPHP v5.

## Key Classes
- **Form Field**: `LaraZeus\FilamentLocationPickrField\Forms\Components\LocationPickr` (extends `Filament\Forms\Components\Field`)
- **Infolist Entry**: `LaraZeus\FilamentLocationPickrField\Infolists\Components\LocationPickr` (extends `Filament\Infolists\Components\Entry`)
- **Service Provider**: `LaraZeus\FilamentLocationPickrField\LocationPickrFieldServiceProvider` (`$name = 'filament-locationpickr-field'`, registers `locationpickr` CSS and `locationpickr-field` / `locationpickr-entry` Alpine components)

## Rules & Anti-Patterns
- **No Filament Panel Plugin**: Do not register a panel plugin; use the Form and Infolist `LocationPickr` components directly.
- **Google Maps API key required**: Set `GMAP_API` in `.env` or `key` in `config/filament-locationpickr-field.php`.
- **Call `->clickable()` explicitly on the Form field**: `Forms\Components\LocationPickr` initializes `$clickable = false` by default (ignoring the config's `default_clickable => true`); call `->clickable()` if users should click the map to move the pin.
- **Coordinate format in `defaultLocation()`**: Pass `['lat' => 41.328, 'lng' => 19.818]` or numeric floats `[41.328, 19.818]` (avoid string coordinates on the Infolist entry).
- **Publish Filament assets**: Run `php artisan filament:assets` if your app publishes Filament assets so the package CSS and Alpine scripts load.
