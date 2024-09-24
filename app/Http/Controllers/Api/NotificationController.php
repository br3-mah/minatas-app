<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import the DB facade

class NotificationController extends Controller
{
    public function myNotifications($id){
        try {
            // Get the authenticated user's ID
            $user = User::where('id', $id)->first();
            $notifications = $user->notifications()->get();
            // Optionally, return the notifications as JSON or other response type
            return response()->json([
                'success' => true,
                'notifications' => $notifications,
            ]);
        } catch (\Throwable $th) {
            // Handle the error, possibly by returning a JSON response indicating failure
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve notifications',
                'error' => $th->getMessage(),
            ], 500); // Use HTTP 500 to indicate server error
        }
    }
}
