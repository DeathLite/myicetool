<?php

use Illuminate\Database\Seeder;

class TypesGlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $tg1_id = DB::table('typesglace')->insertGetId([
        'libellé'=>'transparente'
      ]);

      $tg2_id = DB::table('typesglace')->insertGetId([
        'libellé'=>'bleue'
      ]);

      $tg3_id = DB::table('typesglace')->insertGetId([
        'libellé'=>'blanche'
      ]);

      $tg4_id = DB::table('typesglace')->insertGetId([
        'libellé'=>'sérac'
      ]);

      $tg5_id = DB::table('typesglace')->insertGetId([
        'libellé'=>'noire'
      ]);

      $tg6_id = DB::table('typesglace')->insertGetId([
        'libellé'=>'goulotte'
      ]);

      $tg7_id = DB::table('typesglace')->insertGetId([
        'libellé'=>'polystyrène'
      ]);
    }
}
