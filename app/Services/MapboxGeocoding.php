<?php

namespace App\Services;

use Symfony\Component\HttpClient\HttpClient as HttpClient;

// interface MapboxInterface{
//     protected string $baseUrl = 'https://api.mapbox.com/';
//     public function __construct()
//     {

//     }
// }

// https://api.mapbox.com/geocoding/v5/mapbox.places/
// tanta.json?
// country=eg
// &limit=1
// &types=place
// &language=ar
// &access_token=pk.eyJ1Ijoia2FyZWVtYWxsYW0iLCJhIjoiY2xkcTlhcmR2MWF6eTNubXgxemdkd3Z1ayJ9.ovWX9Cw84BmxZtvUh_2aFg

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
    protected $baseUrl;
    protected $apiKey;
    protected $client;

    public function __construct()
    {
        $this->baseUrl = 'https://api.mapbox.com/';
        $this->apiKey = config('mapbox.api_key');
        $this->client = HttpClient::create(['max_redirects' => 3]);
    }

    // public function getCoordinates(string $name)
    // {
    //     $url = $baseUrl
    //         . 'a';
    //     $response = $this->client->request('GET', $this->baseUrl);
    //     $data = $response->getContent();
    //     $data_parsed = json_decode($data);
    //     dd($data_parsed);
    // }

    public function geocoding(string $search_text, string $endpoint = 'mapbox.places')
    {
        // https://api.mapbox.com/geocoding/v5/{endpoint}/{search_text}.json

        $response = $this->client->request(
            'GET',
            'https://api.mapbox.com/geocoding/v5/'
            . $endpoint
            . '/' . $search_text
            . '.json'
            . '?'
            // . 'access_token=' . $this->apiKey;
            . $this->apiKey);

        $data = $response->getContent();
        $data_parsed = json_decode($data);
        dd($data_parsed);
    }

    public function getInfo(string $name)
    {
        // preg_replace("/[(\.)(\s)]/", "", $formFields['name']);
        $n = preg_replace("/[^a-zA-Z0-9]/", "", $name);
    }

}
