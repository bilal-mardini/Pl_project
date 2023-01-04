<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Compeleteprofile;
use App\Models\Consualting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string',
            'role_id' => 'required|string',

        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'role_id' => $fields['role_id'],
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response([
            'message' => ' create successfully !', $response
        ], 201);
    }
    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response(
                ['errors' => 'Invalid credentials'],
                Response::HTTP_UNAUTHORIZED
            );
        }
        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;
        Auth::attempt($request->only('email', 'password'));
        return response(
            ['jwt' => $token]
        );
    }
    public function logout(Request $request)
    {
        if ($request->user()) {
            $request->user()->tokens()->delete();
        }

        return response()->json(['message' => 'logged '], 200);
    }
    public function compeleteprofile(Request $request)
    {
        $compeleteprofile = $request->validate([
            'image_url' => 'required|string|unique:users,email',
            'experince_title' => 'required|string',
            'experince_desc' => 'required|string',
            'phone' => 'required|string',
            'adress' => 'required|string',
            'available_time' => 'required|string',
            'consualting_id' => 'required|string',

        ]);
        $usercompelete = User::where('id', $request->user_id)->update([
            'image_url' => $compeleteprofile['image_url'],
            'experince_title' => $compeleteprofile['experince_title'],
            'experince_desc' => $compeleteprofile['experince_desc'],
            'phone' => $compeleteprofile['phone'],
            'adress' => $compeleteprofile['adress'],
            'available_time' => $compeleteprofile['available_time'],
            'consualting_id' => $compeleteprofile['consualting_id'],
        ]);
        return response([
            'message' => ' update successfully !',
        ], 201);
    }
    public function show($id){
 $expert_detalis=User::find($id);
 if (!$expert_detalis) {
    return response()->json([
        'message' => '404 Not Found'
    ], 400);
}
 return response($expert_detalis);
    }
    // public function rate(Request $request ,$id){
    //     $rate = User::find($id);
    //     $rate->rate = $request->input('rate');
    //     return response()->json($rate);
    // }
}

