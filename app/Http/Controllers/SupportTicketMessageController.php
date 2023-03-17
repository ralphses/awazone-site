<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewSupportMessage;
use App\Models\SupportTicket;
use App\Models\SupportTicketMessage;
use Illuminate\Http\Request;
use Nette\Utils\Random;

class SupportTicketMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $ticket = $request->get('ticket');

        try {
            if($ticket) {

                $ticket = SupportTicket::where('ticket_id', $ticket)->first();

                $messages = SupportTicketMessage::where('ticket_id', $ticket->id)
                            ->orderBy('created_at', 'asc')
                            ->paginate(10);

                $pages = $messages->getUrlRange(1, $messages->lastPage());

                // dd($pages);

                return view('dashboard.users.support.message.ticket-message', ['pages' => $pages, 'messages' => $messages, 'ticket' => $ticket]);
            }
            else {

                $messages = SupportTicketMessage::orderBy('created_at', 'desc')
                            ->paginate(10);

                $pages = $messages->getUrlRange(1, $messages->lastPage());

                return view('dashboard.users.support.message.all', ['pages' => $pages, 'messages' => $messages]);

            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Invalid Parameters');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'message' => ['required']
        ]);
        
        try {
            $ticket = SupportTicket::where('ticket_id', $request->get('ticket'))->first();
            if($ticket) {
                $m = SupportTicketMessage::create([
                    'message' => $request->get('message'),
                    'sender' => $request->user()->name,
                    'ticket_id' => $ticket->id
                ]);

                return back();
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SupportTicketMessage $supportTicketMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SupportTicketMessage $supportTicketMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SupportTicketMessage $supportTicketMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SupportTicketMessage $supportTicketMessage)
    {
        //
    }
}
