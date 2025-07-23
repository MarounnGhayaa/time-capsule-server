<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Services\User\CapsuleService;

class DashboardController extends Controller {

    public function getUserCapsules($id) {
        $capsules = CapsuleService::getUserCapsules($id);
        return $this->responseJSON($capsules);
    }

    public function getPastCapsules($id){
        $capsules = CapsuleService::getPastCapsules($id);
        return $this->responseJSON($capsules);
    }

    public function getUpcomingCapsules($id) {
        $capsules = CapsuleService::getUpcomingCapsules($id);
        return $this->responseJSON($capsules);
    }
}
