<?php

use Illuminate\Database\Seeder;

class ConstituantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $c1_id = DB::table('constituants')->insertGetId([
        'libellé'=>'stalactites'
      ]);

      $c2_id = DB::table('constituants')->insertGetId([
        'libellé'=>'rideaux'
      ]);

      $c3_id = DB::table('constituants')->insertGetId([
        'libellé'=>'colonnes'
      ]);

      $c4_id = DB::table('constituants')->insertGetId([
        'libellé'=>'tube creux'
      ]);

      $c5_id = DB::table('constituants')->insertGetId([
        'libellé'=>'cloches'
      ]);

      $c6_id = DB::table('constituants')->insertGetId([
        'libellé'=>'méduses'
      ]);

      $c7_id = DB::table('constituants')->insertGetId([
        'libellé'=>'flûtes'
      ]);

      $c8_id = DB::table('constituants')->insertGetId([
        'libellé'=>'cigares'
      ]);

      $c9_id = DB::table('constituants')->insertGetId([
        'libellé'=>'cônes'
      ]);

      $c10_id = DB::table('constituants')->insertGetId([
        'libellé'=>'boules et choux-fleurs'
      ]);
    }
}
