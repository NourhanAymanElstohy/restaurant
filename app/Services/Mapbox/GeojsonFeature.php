<?php

namespace App\Services\Mapbox;


/**
 * Geocoding Feature Object.
 *
 * @property public string $text;
 * @property public string $placeName;
 * @property public array $center;
 * @property public mixed $json;
 */
class GeojsonFeature
{
    public string $text;
    public string $placeName;
    public array $center;
    public mixed $json;

    public function __construct($feature)
    {
        $this->text = $feature['text'];
        $this->placeName = $feature['place_name'];
        $this->center = $feature['center'];
        $this->json = $feature;
    }
}
