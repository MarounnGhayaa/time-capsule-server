<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Capsule;
class DashboardController extends Controller
{
    public function printDash() {
        return ("Hello Dashboard!");
    }

    public function getUserCapsules($id) {
        $capsules = Capsule::where('user_id', $id)->get();

        $response = [];
        $response["status"] = "success";
        $response["payload"] = $capsules;
        return json_encode($response, 200);
    }

    public function getTotalCapsulesNb($id){
        $capsulesCount = Capsule::where('user_id', $id)->count();
        $response = [];
        $response["status"] = "success";
        $response["payload"] = $capsulesCount;

        return json_encode($response, 200);
    }

    public function getPastCapsulesNb($id) {
        $pastCapsules = Capsule::where('user_id', $id)
                        ->where('reveal_at', '<', now())
                        ->count();

        $response = [];
        $response["status"] = "success";
        $response["payload"] = $pastCapsules;

        return json_encode($response, 200);
    }

        public function getUpcomingCapsulesNb($id) {
        $upcomingCapsules = Capsule::where('user_id', $id)
                        ->where('reveal_at', '>', now())
                        ->count();

        $response = [];
        $response["status"] = "success";
        $response["payload"] = $upcomingCapsules;

        return json_encode($response, 200);
    }

}
