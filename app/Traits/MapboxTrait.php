<?php

namespace App\Traits;


trait MapboxTrait
{
    function generateQueryOptions(array $options)
    {
        $queryOptions = '';

        if (!empty($options)) {
            foreach ($options as $key => $value) {
                $queryOptions .= $key . '=' . $value . '&';
            }
        }
        return $queryOptions;
    }


    function formatSearchText(string $search_text)
    {
        // 1. trimming whitespaces
        $search_text = str_replace(" ", "%20", $search_text);
        // 2. removing unncessery letters
        $search_text = preg_replace("/[^a-zA-Z0-9%]/", "", $search_text);

        return $search_text;
    }
}
