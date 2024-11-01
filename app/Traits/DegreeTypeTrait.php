<?php 

namespace App\Traits;

trait DegreeTypeTrait
{
    protected function selectDegreeType(array $weather, string $degreeType): array
    {
        if ($degreeType === 'celsius') {

            unset($weather['current']['temp_f'], $weather['current']['wind_mph'], $weather['current']['feelslike_f']);
            $weather['current']['temp'] = $weather['current']['temp_c'];
            $weather['current']['wind'] = $weather['current']['wind_kph'];
            $weather['current']['feelslike'] = $weather['current']['feelslike_c'];
            unset($weather['current']['temp_c'], $weather['current']['wind_kph'], $weather['current']['feelslike_c']);

          } elseif ($degreeType === 'fahrenheit') {

            unset($weather['current']['temp_c'], $weather['current']['wind_kph'], $weather['current']['feelslike_c']);
            $weather['current']['temp'] = $weather['current']['temp_f'];
            $weather['current']['wind'] = $weather['current']['wind_mph'];
            $weather['current']['feelslike'] = $weather['current']['feelslike_f'];
            unset($weather['current']['temp_f'], $weather['current']['wind_mph'], $weather['current']['feelslike_f']);
            
          }

        return $weather;
        
    }
}