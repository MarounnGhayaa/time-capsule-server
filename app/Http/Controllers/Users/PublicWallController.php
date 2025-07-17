<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Capsule;

class PublicWallController extends Controller
{
    public function printPub() {
        return ("Hello Wall!");
    }


    public function getPublicCapsules(){
        $capsules = Capsule::where('privacy', 'public')->get();

        $response = [];
        $response["status"] = "success";
        $response["payload"] = $capsules;

        return json_encode($response, 200);
    }

    public function getSpecificCapsule($id){
        $capsule = Capsule::find($id);

        $response = [];
        $response["status"] = "success";
        $response["payload"] = $capsule;

        return json_encode($response, 200);
    }
}
