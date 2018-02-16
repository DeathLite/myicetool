<?php

use Illuminate\Database\Seeder;

class StructuresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $s1_id = DB::table('structures')->insertGetId([
        'libellé'=>'gros débit'
      ]);

      $s2_id = DB::table('structures')->insertGetId([
        'libellé'=>'ruissellement'
      ]);
    }
}
