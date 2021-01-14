<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vehicle;

use Validator;

class Vehicles extends Controller
{
    //

    protected $vehicle;

    public function __construct()
    {
        $this->vehicle = new Vehicle;
    }

  public function saveVehicle(Request $request){

//before save check validation
      $validator = Validator::make($request->all(),
          [
              'vehicle_number'=>'required|string',
              'type'=>'required|string',
              'owner_name'=>'string',
              'driver_name'=>'string',
          ]);

      if($validator->fails())
      {
          return response()->json([
              "success"=>false,
              "message"=>$validator->messages()->toArray(),
          ],400);
      }


      $registerComplete = $this->vehicle::create([
          'vehicle_number'=>$request->vehicle_number,
          'type'=>$request->type,
          'owner_name'=>$request->owner_name,
          'driver_name'=> $request->driver_name,
      ]);

      if($registerComplete)
      {
          return response()->json([
             'message'=>'vehicle added succesfuly'
          ]);
      }


  }








    public function getLocation(Request $request){



        $vehicles = DB::table('vehicles')
            ->select('vehicle_number')
            ->where('id'==$request->id);

        return response()->json([
            "vehicle_number"=>$request->Vehicle()->vehicle_number,
//            'firstname'=>$request->user()->firstname,
        ],200);


//        if($request->id=="2") {
//
//            return response()->json([
//                'longitude' => 12.34,
//                'latitude' => 6.56,
//            ], 200);
//        }
//
//        else{
//            return response()->json([
//                'message' => 'wrong id',
//            ]);
//        }

    }



}
