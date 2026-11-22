---
title: Assets
weight: 3
---

## Filament Assets

The plugin registers its CSS and Alpine components (`locationpickr-field`, `locationpickr-entry`) through `FilamentAsset::register()` and loads them on demand.

If your application publishes Filament assets, run:

```bash
php artisan filament:assets
```

## Compiling assets

We use [Tailwind CSS](https://tailwindcss.com/) and custom Filament themes.
If you are using Tailwind CSS v4, class scanning is configured from your CSS entry file using `@source` (instead of the old `tailwind.config.js` `content` array).

### Custom Classes

Add these source paths to your app stylesheet (for example `resources/css/app.css`):

```css
@import "tailwindcss";

@source "../../vendor/lara-zeus/filament-locationpickr-field/resources/views/**/*.blade.php";
@source "../../vendor/lara-zeus/filament-locationpickr-field/resources/views/themes/**/*.blade.php";
```
