<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filename = public_path('uploads/data/Countries.txt');
        $content = File::get($filename);
        $countries = explode("~", $content);
        foreach ($countries as $country) {
            \App\Models\Country::create(['name' => ucfirst(strtolower(trim($country)))]);
        }
    }
}
