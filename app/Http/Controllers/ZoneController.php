<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zone;

class ZoneController extends Controller
{
  public function save(Request $request){

    $latNE = $request->input('latNE');
    $latSW = $request->input('latSW');
    $lngNE = $request->input('lngNE');
    $lngSW = $request->input('lngSW');
    $name = $request->input('name');


    $save = Zone::insertGetId([
      'nom' => $name,
      'latNE' => $latNE,
      'latSW' => $latSW,
      'lngNE' => $lngNE,
      'lngSW' => $lngSW,
    ]);
    return $save;
  }

  public function delete(Request $request){
    $id = $request->input('id');

    $delete=Zone::where('id',$id)->delete();
  }

  public function update(Request $request){
    $latNE = $request->input('latNE');
    $latSW = $request->input('latSW');
    $lngNE = $request->input('lngNE');
    $lngSW = $request->input('lngSW');
    $name = $request->input('name');
    $id = $request->input('id');

  $update=Zone::where('id',$id)->update(['nom'=>$name, 'latNE' => $latNE, 'latSW'=>$latSW, 'lngNE'=>$lngNE, 'lngSW'=>$lngSW]);
  }

  public function detail(){

  }

  public function get(){
    $zones = Zone::all();

    return $zones;
  }

  public function create(){

  }

}
