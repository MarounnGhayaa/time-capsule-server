<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\User\CapsuleService;
use App\Models\Capsule;

class PublicWallController extends Controller {
    public function getPublicCapsules() {
        $capsules = CapsuleService::getPublicCapsules();

        return $this->responseJSON($capsules);
    }

}
