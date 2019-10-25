<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all()->where('user_id', auth()->user()->id);
        return response([
            'tickets' => $tickets
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'reason' => 'required',
        ]);

        $newTicket = new Ticket();
        $newTicket->reason = $validatedData['reason'];
        $newTicket->user_id = auth()->user()->id;

        $newTicket->save();

        return response($newTicket);
    }
}
