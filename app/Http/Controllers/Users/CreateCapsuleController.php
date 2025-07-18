<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Capsule;
use App\Services\CapsuleService;
use App\Traits\ResponseTrait;
class CreateCapsuleController extends Controller {
    use ResponseTrait;
    public function printCap() {
        return ("Hello Capsule!");
    }

    public function addCapsule(Request $request) {
        $capsule = new Capsule();
        $data = $request->all();
        $capsule = CapsuleService::createCapsule($data, $capsule);

        return $this->responseJSON($capsule);
    }
}
