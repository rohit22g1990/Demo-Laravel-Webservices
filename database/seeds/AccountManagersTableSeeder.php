<?php

use Illuminate\Database\Seeder;

class AccountManagersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AccountManager::create(['name' => 'OAK']);
        \App\Models\AccountManager::create(['name' => 'OAK Software']);
        \App\Models\AccountManager::create(['name' => 'Acc Type1']);
        \App\Models\AccountManager::create(['name' => 'Acc Type2']);
    }
}
