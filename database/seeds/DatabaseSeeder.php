<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ConstituantsSeeder::class);
        $this->call(LanguesSeeder::class);
        $this->call(OrientationsSeeder::class);
        $this->call(StructuresSeeder::class);
        $this->call(SupportsSeeder::class);
        $this->call(TypesFinDeVieSeeder::class);
        $this->call(TypesGlaceSeeder::class);
    }
}
