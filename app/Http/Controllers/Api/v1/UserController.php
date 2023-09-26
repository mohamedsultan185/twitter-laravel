<?php

namespace App\Http\Controllers\api\v1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    // public function store(Request $request)
    // {

    //         $user = User::create($request);

    //         return response()->json(['message' => 'User inserted successfully', 'user' => $user], 201);

    // }


    // public function update(Request $request, $id)
    // {

    //     $user = User::find($id);

    //     if (!$user) {
    //         return response()->json(['message' => 'User not found'], 404);
    //     }

    //     $user->update([
    //         'name' => $request->input('name'),
    //         'username' => $request->input('username'),
    //         'email' => $request->input('email'),
    //         'email_verified_at' => $request->input('email_verified_at'),
    //         'image' => $request->input('image'),
    //         'phone' => $request->input('phone'),
    //         'birthday' => $request->input('birthday'),
    //     ]);

    //     return response()->json(['message' => 'User updated successfully']);
    // }


    public function updateOrCreate(Request $request)
    {
        $user = User::updateOrCreate(['id' => $request->id], $request->all());
        return response()->json(['message' => 'Data saved successfully', 'user' =>  $user]);
    }



    public function deleteUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Delete the user record
        $user->delete();

        return response()->json(['message' => 'User deleted successfully'], 200);
    }
}
