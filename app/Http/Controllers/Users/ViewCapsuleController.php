<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\User\CapsuleService;
use App\Models\Capsule;
class ViewCapsuleController extends Controller {
    public function viewCapsule($id) {
        $capsule = Capsule::find($id);

        return $this->responseJSON($capsule);
    }

public function viewSharedCapsule($token) {
    $data = CapsuleService::getSharedCapsuleData($token);

    if (!$data) {
        return response()->json(['message' => 'Capsule not found'], 404);
    }

    return $this->responseJSON($data);
}

}
