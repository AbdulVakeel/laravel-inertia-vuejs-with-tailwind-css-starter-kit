
<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Support\Facades\File;


/**
 * getPaginate
 *
 * @param  mixed $paginate
 * @return void
 */

if (!function_exists('getPaginate')) {
    function getPaginate($paginate = 10)
    {
        return $paginate;
    }
}


/**
 * getGlobalSearchFilter
 *
 * @param  mixed $searchableFields
 * @return void
 */
if (!function_exists('getGlobalSearchFilter')) {
    function getGlobalSearchFilter($searchableFields)
    {
        return  AllowedFilter::callback(
            'global',
            fn ($query, $value) => $query->queryFilter($searchableFields, $value)
        );
    }
}


/**
 * getTranslations
 *
 * @param  mixed $locale
 * @return void
 */

 if (!function_exists('getTranslations')) {
   

function getTranslations($locale)
{
    return Cache::rememberForever("translations_$locale", function () use ($locale) {
        $phpTranslations = [];
        $jsonTranslations = [];

        $langPath  = base_path('lang') . "/$locale";

        if (File::exists($langPath)) {
            $phpTranslations = collect(File::allFiles($langPath))
                ->filter(function ($file) {
                    return $file->getExtension() === "php";
                })->flatMap(function ($file) {
                    return Arr::dot(File::getRequire($file->getRealPath()));
                })->toArray();
        }

        if (File::exists("$langPath.json")) {
            $jsonTranslations = json_decode(File::get("$langPath.json"), true);
        }
        return array_merge($phpTranslations, $jsonTranslations);
    });
}


}


/**
 * InputKeyTitles
 *
 * @param  mixed $text
 * @return void
 */

if (!function_exists('InputKeyTitles')) {
    function InputKeyTitles($text)
    {
        return ucfirst(preg_replace("/[^A-Za-z0-9 ]/", ' ', $text));
    }
    

}


if (!function_exists('titleToKey')) {
   
    function titleToKey($text)
    {
        return strtolower(str_replace(' ', '_', $text));
    }

}


if (!function_exists('getCountries')) {
   
    function getCountries()
    {
        $countryData = json_decode(file_get_contents(resource_path('views/components/country_code.json')), true);
        $result = [];
        foreach ($countryData as $code => $info) {
            $result[] = [
                "country" => $info["country"],
                "country_code" => $info["country_code"],
                "country_code" => $code
            ];
        }
        return $result;
    }
    
    
}


if (!function_exists('getCountry')) {
   
    function getCountry($countryName)
{
    $countries = getCountries();
    return array_filter($countries, function ($item) use ($countryName) {
        return $item['code'] === $countryName;
    });
}

}




