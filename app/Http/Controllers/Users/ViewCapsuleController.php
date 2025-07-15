<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewCapsuleController extends Controller
{
    public function printView() {
        return ("Hello View!");
    }
}
