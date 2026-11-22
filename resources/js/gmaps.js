import { importLibrary, setOptions } from '@googlemaps/js-api-loader'

/**
 * Configures Google Maps once per page and imports the requested libraries.
 * Guards against multiple components or other plugins re-calling setOptions().
 */
export async function loadGoogleMaps(apiKey, libraries) {
    if (!window.google?.maps?.importLibrary) {
        setOptions({
            key: apiKey,
            v: 'weekly',
        })
    }

    const loader = window.google?.maps?.importLibrary
        ? (lib) => window.google.maps.importLibrary(lib)
        : (lib) => importLibrary(lib)

    return Promise.all(libraries.map(loader))
}
