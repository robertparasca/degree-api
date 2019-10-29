<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BaseRequest;
use App\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(BaseRequest $request)
    {
        $tickets = Ticket::all()->where('user_id', $request->user()->id);
        return $this->response200(['tickets' => $tickets]);
    }

    public function store(BaseRequest $request)
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
