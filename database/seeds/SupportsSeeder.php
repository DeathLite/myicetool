<?php

use Illuminate\Database\Seeder;

class SupportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $su1_id = DB::table('supports')->insertGetId([
        'libellé'=>'dalles rocheuses'
      ]);

      $su2_id = DB::table('supports')->insertGetId([
        'libellé'=>'pentes d\'herbes'
      ]);
    }
}
