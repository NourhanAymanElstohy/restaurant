<?php

namespace App\Services\Mapbox;

use App\Traits\MapboxTrait;
use Illuminate\Support\Facades\Http;

/**
 * The Mapbox Geocoding API does two things: forward geocoding and reverse geocoding.
 *
 * Supports Forward and Reverse geocoding.
 *
 * For more information on the Mapbox Geocoding API and how it works,
 * visit the guide: **https://docs.mapbox.com/api/search/geocoding/**
 */
class MapboxGeocoding
{
    use MapboxTrait;
    private $baseUrl;
    private $apiKey;

    public function __construct()
    {
        $this->baseUrl = 'https://api.mapbox.com/geocoding/v5/';
        $this->apiKey = config('mapbox.apikey');
    }

    public function forward(string $search_text, array $options = [], string $endpoint = 'mapbox.places'): GeojsonFeature
    {
        // Parsing Search Text
        $searchText = $this->formatSearchText($search_text);
        return $this->makeRequest($searchText, $options, $endpoint);
    }

    public function reverse(float $lat, float $lng, array $options = [], string $endpoint = 'mapbox.places'): GeojsonFeature
    {
        $coordinates = $lng . ',' . $lat;
        return $this->makeRequest($coordinates, $options, $endpoint);
    }

    public function makeRequest(string $data, mixed $options, string $endpoint = 'mapbox.places'): GeojsonFeature
    {
        // Parsing Options
        $queryOptions = $this->generateQueryOptions($options);

        // Request Forward Geocoding
        $response = Http::get($this->baseUrl
            . $endpoint
            . '/'
            . $data
            . '.json'
            . '?'
            . $queryOptions
            . 'access_token=' . $this->apiKey);

        $feature = $response->json()['features'][0];

        return new GeojsonFeature($feature);
    }


    private function generateQueryOptions(array $options)
    {
        $queryOptions = '';

        if (!empty($options)) {
            foreach ($options as $key => $value) {
                $queryOptions .= $key . '=' . $value . '&';
            }
        }
        return $queryOptions;
    }


    private function formatSearchText(string $search_text)
    {
        // 1. trimming whitespaces
        $search_text = str_replace(" ", "%20", $search_text);
        // 2. removing unncessery letters
        $search_text = preg_replace("/[^a-zA-Z0-9%]/", "", $search_text);

        return $search_text;
    }
}
