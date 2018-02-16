<?php

use Illuminate\Database\Seeder;

class LanguesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $l1_id = DB::table('langues')->insertGetId([
        'libellé'=>'français'
      ]);

      $l2_id = DB::table('langues')->insertGetId([
        'libellé'=>'anglais'
      ]);
    }
}
