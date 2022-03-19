<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // validate request
        $validation = Validator::make($request->all(), [
            'email' => ['required', 'unique:users', 'email'],
            'name' => ['required'],
            'password_confirmation' => ['required'],
            'password' => ['required', 'min:6', 'confirmed:confirm_password'],
        ]);

        //retur validation error
        if ($validation->fails()) {
            return $this->returnValidationError($validation);
        }

        //create user
        User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => $request->password,
        ]);

        return $this->returnResponse('Your registration is successful');
    }
}
