<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AccountManagersTableSeeder::class);
        $this->call(RelationTypesTableSeeder::class);
        $this->call(AddressTypesTableSeeder::class);
        $this->call(ContactTypesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
    }
}
