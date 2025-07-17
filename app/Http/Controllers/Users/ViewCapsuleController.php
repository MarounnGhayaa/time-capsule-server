<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Capsule;
class ViewCapsuleController extends Controller
{
    public function printView() {
        return ("Hello View!");
    }

    public function viewCapsule($id) {
        $capsule = Capsule::find($id);

        $response = [];
        $response["status"] = "success";
        $response["payload"] = $capsule;

        return json_encode($response, 200);   
    }
}
