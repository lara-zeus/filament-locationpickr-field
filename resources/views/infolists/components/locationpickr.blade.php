<x-dynamic-component
    :component="$getEntryWrapperView()"
    :entry="$entry"
>
    <div
        x-load
        x-load-css="[@js(\Filament\Support\Facades\FilamentAsset::getStyleHref('locationpickr', 'lara-zeus/filament-locationpickr-field'))]"
        x-load-src="{{ \Filament\Support\Facades\FilamentAsset::getAlpineComponentSrc('locationpickr-entry', 'lara-zeus/filament-locationpickr-field') }}"
        wire:ignore
        x-data="locationPickrEntry({
            location: @js($getState()),
            config: {{ $getMapConfig() }},
        })"
        x-ignore
    >
        <div
            x-ref="map"
            class="locationPickr w-full"
            style="height: {{ $getHeight() }}"
        ></div>
    </div>
</x-dynamic-component>
