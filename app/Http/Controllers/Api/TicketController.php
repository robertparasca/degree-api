<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BaseRequest;
use App\Institute;
use App\Ticket;
use PDF;

class TicketController extends Controller
{
    public function index(BaseRequest $request)
    {
        $user = $request->user();
        if ($user->hasPermission('TicketController_validate')) {
            $tickets = Ticket::orderBy('status')->orderBy('created_at', 'desc')->get();
            return $this->response200(['tickets' => $tickets]);
        }
        $tickets = Ticket::where('user_id', $user->id)->get();
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

    public function generatePDF($id)
    {
        $institute = Institute::where('id', 1)->get();
        $ticket = Ticket::where('id', $id)->with('user')->get();

        $obj = [
            'institute' => $institute[0],
            'ticket' => $ticket[0]
        ];
        $pdf = PDF::loadView('ticket', compact('obj'));

        return $pdf->download('disney.pdf');
    }
}
