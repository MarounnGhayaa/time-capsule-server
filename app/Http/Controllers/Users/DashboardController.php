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
        return $this->responseJSON($capsules);
    }

    public function getTotalCapsulesNb($id){
        $capsulesCount = Capsule::where('user_id', $id)->count();
        return $this->responseJSON($capsulesCount);
    }

    public function getPastCapsulesNb($id) {
        $pastCapsules = Capsule::where('user_id', $id)
                        ->where('reveal_at', '<', now())
                        ->count();

        return $this->responseJSON($pastCapsules);
    }

        public function getUpcomingCapsulesNb($id) {
        $upcomingCapsules = Capsule::where('user_id', $id)
                        ->where('reveal_at', '>', now())
                        ->count();

        return $this->responseJSON($upcomingCapsules);
    }

}
