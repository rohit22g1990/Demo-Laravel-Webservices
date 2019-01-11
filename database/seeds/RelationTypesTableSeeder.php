<?php

use Illuminate\Database\Seeder;

class RelationTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\RelationType::create(['type' => 'Type 1', 'created_by' => '0']);
        \App\Models\RelationType::create(['type' => 'Type 2', 'created_by' => '0']);
    }
}
