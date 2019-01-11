<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $filename = public_path('uploads/data/Cities Netherlands.txt');
        $content = File::get($filename);
        $cities =explode("\n", $content);

        $countryIDs = DB::table('countries')->pluck('id');

        foreach ($cities as $city) {
            $checkCity = \App\Models\City::where('name' , strtolower(trim($city)))->get();
            (count($checkCity) <= 0 && !empty($city))
                ? \App\Models\City::create(['name' => strtolower(trim($city)), 'country_id' => $faker->randomElement($countryIDs)])
                : '';
        }
    }
}
