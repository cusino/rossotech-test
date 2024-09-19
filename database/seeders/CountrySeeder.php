<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    {
        $countries = [
            ['name' => 'Italy', 'iso_code' => 'IT'],
            ['name' => 'France', 'iso_code' => 'FR'],
            ['name' => 'Germany', 'iso_code' => 'DE'],
            ['name' => 'Spain', 'iso_code' => 'ES'],
            ['name' => 'United States', 'iso_code' => 'US'],
            ['name' => 'United Kingdom', 'iso_code' => 'GB'],
            ['name' => 'Canada', 'iso_code' => 'CA'],
            ['name' => 'Australia', 'iso_code' => 'AU'],
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}
