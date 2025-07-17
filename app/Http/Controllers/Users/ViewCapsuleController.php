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

        return $this->responseJSON($capsule);
    }
}
