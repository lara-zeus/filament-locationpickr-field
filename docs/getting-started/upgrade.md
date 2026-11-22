---
title: Upgrade
weight: 99
---

## Upgrade Guide

Document breaking changes and migration steps between major versions.

### Google Maps JS API Loader v2

- Run `php artisan filament:assets` after updating so Filament publishes the rebuilt `field.js` and `entry.js` bundles.
- No PHP, Blade, or config changes are required.
- Multiple `LocationPickr` fields and infolist entries on the same page are supported: `setOptions()` is only called once when `window.google.maps.importLibrary` is not yet defined.
- If you previously forked or imported `resources/js/field.js` or `resources/js/entry.js` directly, note that `@googlemaps/js-api-loader` v2 removes the `Loader` class in favor of `setOptions()` and `importLibrary()`.
