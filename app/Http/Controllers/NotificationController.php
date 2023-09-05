<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Get the authenticated user
        $notifications = $user->notifications;
        return response()->json(['notifications' => $notifications]);
    }
}
