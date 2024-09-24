<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\TicketCreated;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SupportController extends Controller
{
    public function logTicket(Request $request){
        try {
            $user = User::where('id', $request->input('user_id'))->first();

            $ticket = Ticket::create([
                'user_id' => $user->id,
                'message' => $request->input('message'),
                'status' => 0,
            ]);

            $data = [
                'user' => $user->fname . ' ' . $user->lname,
                'type' => 'user',
                'id' => $ticket->id,
                'message' => $ticket->message,
            ];

            // Send Email to User
            Mail::to($user->email)->send(new TicketCreated($data));

            $data2 = [
                'user' => $user->fname . ' ' . $user->lname,
                'type' => 'admin',
                'id' => $ticket->id,
                'message' => $ticket->message,
            ];

            // Send Email to MightyFinance
            Mail::to('nyeleti.bremah@gmail.com')->send(new TicketCreated($data2));


            return response()->json([
                'message' => 'Ticket submitted successfully.',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed.'.$th->getMessage(),
            ]);
        }
    }
}
