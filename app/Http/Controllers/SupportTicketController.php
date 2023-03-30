<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewSupportMessage;
use App\Models\SupportTicket;
use App\Models\SupportTicketMessage;
use Illuminate\Http\Request;
use Nette\Utils\Random;

class SupportTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = SupportTicket::paginate(10);

        $pages = $tickets->getUrlRange(1, $tickets->lastPage());

        return view('dashboard.users.support.ticket.all', ['pages' => $pages, 'tickets' => $tickets]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.support.message.new');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewSupportMessage $request)
    {
        $request->validated();

        $attachment = $request->hasFile("message_attachment") ? $request->file("message_attachment") : "";

        try {
            $ticket = SupportTicket::create([
                'ticket_id' => Random::generate(10, '0-9A-Z'),
                'subject' => $request->get('subject'),
                'message' => $request->get('message'),
                'name' => $request->get('message_name'),
                'email' => $request->get('message_email'),
                'phone' => $request->get('message_phone'),
                'attachment' => $attachment->store('public/attachements'),

            ]);

            SupportTicketMessage::create([
                'ticket_id' => $ticket->id,
                'message' => $request->get('message'),
                'sender' => $request->get('message_name')
            ]);

            return redirect()->route('dashboard.home')->with('success', 'Message sent! A ticket ID have been created for this enquiry');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SupportTicket $supportTicket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SupportTicket $supportTicket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SupportTicket $supportTicket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SupportTicket $supportTicket)
    {
        //
    }
}
