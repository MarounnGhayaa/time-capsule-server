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

        return $this->responseJSON($capsules);
    }

    public function getSpecificCapsule($id){
        $capsule = Capsule::find($id);

        return $this->responseJSON($capsule);
    }
}
