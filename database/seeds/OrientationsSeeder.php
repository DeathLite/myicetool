<?php

use Illuminate\Database\Seeder;

class OrientationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $o1_id = DB::table('orientations')->insertGetId([
        'libellé'=>'N'
      ]);

      $o2_id = DB::table('orientations')->insertGetId([
        'libellé'=>'NNE'
      ]);

      $o3_id = DB::table('orientations')->insertGetId([
        'libellé'=>'NE'
      ]);

      $o4_id = DB::table('orientations')->insertGetId([
        'libellé'=>'ENE'
      ]);

      $o5_id = DB::table('orientations')->insertGetId([
        'libellé'=>'E'
      ]);

      $o6_id = DB::table('orientations')->insertGetId([
        'libellé'=>'ESE'
      ]);

      $o7_id = DB::table('orientations')->insertGetId([
        'libellé'=>'SE'
      ]);

      $o8_id = DB::table('orientations')->insertGetId([
        'libellé'=>'SSE'
      ]);

      $o9_id = DB::table('orientations')->insertGetId([
        'libellé'=>'S'
      ]);

      $o10_id = DB::table('orientations')->insertGetId([
        'libellé'=>'SSO'
      ]);

      $o11_id = DB::table('orientations')->insertGetId([
        'libellé'=>'SO'
      ]);

      $o12_id = DB::table('orientations')->insertGetId([
        'libellé'=>'OSO'
      ]);

      $o13_id = DB::table('orientations')->insertGetId([
        'libellé'=>'O'
      ]);

      $o14_id = DB::table('orientations')->insertGetId([
        'libellé'=>'ONO'
      ]);

      $o15_id = DB::table('orientations')->insertGetId([
        'libellé'=>'NO'
      ]);

      $o16_id = DB::table('orientations')->insertGetId([
        'libellé'=>'NNO'
      ]);
    }
}
