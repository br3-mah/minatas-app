<?php

namespace App\Http\Controllers;

use App\Mail\TicketCreated;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $user = auth()->user();

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
            Mail::to('test@mightyfinance.co.zm')->send(new TicketCreated($data2));

            // Flash session message
            session()->flash('success', 'Ticket submitted successfully! Our team will get back to you soon.');

            return redirect()->back();
        } catch (\Throwable $th) {
            // Flash session message
            session()->flash('error', 'Ticket could not be submitted.'.$th->getMessage());

            return redirect()->back();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
