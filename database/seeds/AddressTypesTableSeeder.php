<?php

use Illuminate\Database\Seeder;

class AddressTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AddressType::create(['type' => 'Home Address', 'is_default' => '1', 'type_of' => 'home', 'created_by' => '0']);
        \App\Models\AddressType::create(['type' => 'Company Address', 'is_default' => '1', 'type_of' => 'company', 'created_by' => '0']);
        \App\Models\AddressType::create(['type' => 'Mailing Address', 'is_default' => '1', 'type_of' => 'mailing', 'created_by' => '0']);
        \App\Models\AddressType::create(['type' => 'Future Address', 'is_default' => '1', 'type_of' => 'future', 'created_by' => '0']);
    }
}
