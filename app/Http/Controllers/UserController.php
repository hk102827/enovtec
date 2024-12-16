<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL as FacadesURL;
use Url;

class UserController extends Controller
{
    public function login(Request $request)
    {
        // return FacadesURL::to('/');
        $users = User::where('email',$request->email)->first();
        if(!$users || !Hash::check($request->password, $users->password)){
            return response([
                'message' =>['These Credential do Not match Our Record']
            ],404);
        }
        $token = $users->createToken('my-app-token')->plainTextToken;
        $response = [
            'user' => $users,
            'token' => $token,
        ];
        return response($response,201);

    }
}
