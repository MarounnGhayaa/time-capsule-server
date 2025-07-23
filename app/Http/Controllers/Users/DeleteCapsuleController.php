<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Capsule;
use App\Services\User\CapsuleService;
class DeleteCapsuleController extends Controller
{
    public function deleteCapsule($id){
        $capsule = Capsule::findOrFail($id);
        $capsule->delete();

        return response()->json(['message' => 'Capsule deleted successfully.']);
}
}
