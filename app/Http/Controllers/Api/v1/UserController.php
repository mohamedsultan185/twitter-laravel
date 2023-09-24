<?php

namespace App\Http\Controllers\api\v1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function store(Request $request)
    {
        try {
            $user = User::create($request->all());
            return response()->json($user, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to create user'], 500);
        }
    }


    public function update(Request $request, $id)
    {

        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->update([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'email_verified_at' => $request->input('email_verified_at'),
            'image' => $request->input('image'),
            'phone' => $request->input('phone'),
            'birthday' => $request->input('birthday'),
        ]);

        return response()->json(['message' => 'User updated successfully']);
    }
}
