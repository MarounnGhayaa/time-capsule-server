<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\User\CapsuleService;

class CreateCapsuleController extends Controller {
    public function addCapsule(Request $request) {
        $data = $request->all();

        $capsule = CapsuleService::createCapsule($data);

        return response()->json([
            'success' => true,
            'capsule' => $capsule,
        ]);
    }
}
