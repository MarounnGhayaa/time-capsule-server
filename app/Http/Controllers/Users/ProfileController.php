<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
class ProfileController extends Controller
{
    public function printPro() {
        return ("Hello Profile!");
    }

    public function getUserInfo($id) {
        $user = User::find($id);

        return $this->responseJSON($user);  
    }
}
