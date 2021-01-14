<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_number', 'type', 'owner_name','driver_name'
    ];


//public function read(){
//
//    $Vehicle = new Vehicle();
//    $data = $Vehicle->read();
//    var_dump($data);
//}


}
