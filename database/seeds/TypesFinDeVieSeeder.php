<?php

use Illuminate\Database\Seeder;

class TypesFinDeVieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $tfv1_id = DB::table('typesfindevie')->insertGetId([
        'libellé'=>'par effondrement'
      ]);

      $tfv2_id = DB::table('typesfindevie')->insertGetId([
        'libellé'=>'par dislocation'
      ]);

      $tfv3_id = DB::table('typesfindevie')->insertGetId([
        'libellé'=>'progressive'
      ]);
    }
}
