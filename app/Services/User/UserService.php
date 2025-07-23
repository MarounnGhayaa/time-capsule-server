<?php

namespace App\Services\User;

use App\Models\User; 
use Illuminate\Support\Facades\Hash; 

class UserService {
    public static function update( $data, $id){
        $user = User::find($id);

        if (!$user) {
            return null;
        }
        if (isset($data['name'])) {
            $user->name = $data['name'];
        }
        if (isset($data['email'])) {
            $user->email = $data['email'];
        }
        if (isset($data['password']) && !empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }
        $user->save();
        return $user; 
    }
}