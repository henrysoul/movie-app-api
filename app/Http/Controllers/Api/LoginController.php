<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\UserResource;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // validate request
        $validation = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if ($validation->fails()) {
            return $this->returnValidationError($validation);
        }
        // attempt login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $token = $request->user()->createToken('gomomo');
            $data['token'] = $token->plainTextToken;
            $data['user'] = new UserResource($request->user());
            return $this->returnResponse('Login success', $data);
        }

        // return response
        return $this->returnError('Email or password is incorrect');
    }
}
