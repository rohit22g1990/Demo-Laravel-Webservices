<?php

use Illuminate\Database\Seeder;

class ContactTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ContactType::create(['type' => 'Office Phone', 'is_default' => '1', 'type_of' => 'phone', 'created_by' => '0']);
        \App\Models\ContactType::create(['type' => 'Email', 'is_default' => '1', 'type_of' => 'email', 'created_by' => '0']);
        \App\Models\ContactType::create(['type' => 'Private Phone', 'is_default' => '1', 'type_of' => 'mobile', 'created_by' => '0']);
        \App\Models\ContactType::create(['type' => 'Fax', 'is_default' => '1', 'type_of' => 'fax', 'created_by' => '0']);
        \App\Models\ContactType::create(['type' => 'Url', 'is_default' => '1', 'type_of' => 'url', 'created_by' => '0']);
    }
}
