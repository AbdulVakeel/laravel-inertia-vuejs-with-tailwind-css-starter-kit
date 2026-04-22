<?php

namespace App\Http\Controllers;

use App\Models\SupportTicket;
use App\Models\SupportMessage;
use App\Models\SupportAttachment;
use App\Constants\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\QueryBuilder\QueryBuilder;

class TicketController extends Controller
{


public function index()
{
    $data['pageTitle'] = "Support";

    $data['columns'] = $columns = collect([
        ['key' => 'sr', 'label' => 'SN.', 'sortable' => false, 'searchable' => false],
        ['key' => 'ticket', 'label' => 'Ticket', 'sortable' => true, 'searchable' => true],
        ['key' => 'subject', 'label' => 'Subject', 'sortable' => true, 'searchable' => true],
        ['key' => 'priority', 'label' => 'Priority', 'sortable' => true, 'searchable' => false],
        ['key' => 'status', 'label' => 'Status', 'sortable' => true, 'searchable' => false],
        ['key' => 'last_reply', 'label' => 'Last Reply', 'sortable' => true, 'searchable' => false],
        ['key' => 'created_at', 'label' => 'Created Date', 'sortable' => true, 'searchable' => false],
        ['key' => 'actions', 'label' => 'Actions', 'sortable' => false, 'searchable' => false],
    ]);

    $globalSearch = getGlobalSearchFilter(['ticket', 'subject']);

    $query = QueryBuilder::for(SupportTicket::class)
        ->where('user_id', auth()->id())
        ->defaultSort('-id')
        ->allowedSorts($columns->pluck('key')->all())
        ->allowedFilters([...$columns->pluck('key')->all(), $globalSearch]);

    $data['items'] = $query->paginate(request()->perPage ?? getPaginate())->withQueryString();

    return Inertia::render('User/Ticket/Index', [
        'data' => $data,
    ]);
}


    public function create()
    {
        return Inertia::render('User/Ticket/Create');
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'subject'  => 'required|string|max:255',
            'priority' => 'required|in:1,2,3',
            'message'  => 'required|string',
        ]);

        $ticket = SupportTicket::create([
            'user_id'    => $user->id,
            'ticket'     => rand(100000, 999999),
            'name'       => $user->firstname . ' ' . $user->lastname, 
            'email'      => $user->email,
            'subject'    => $request->subject,
            'priority'   => $request->priority,
            'status'     => Status::TICKET_OPEN,
            'last_reply' => Carbon::now(),
        ]);

        SupportMessage::create([
            'support_ticket_id' => $ticket->id,
            'message' => $request->message,
        ]);

        return redirect()->route('user.ticket.index')->with('success', 'Ticket opened successfully!');
    }

    public function show($ticket)
    {
        $user = auth()->user();
        $ticket = SupportTicket::where('ticket', $ticket)
            ->where('user_id', $user->id)
            ->firstOrFail();

        $messages = SupportMessage::where('support_ticket_id', $ticket->id)
            ->with('attachments')
            ->latest()
            ->get();

        return Inertia::render('User/Ticket/View', [
            'ticket'   => $ticket,
            'messages' => $messages,
        ]);
    }

    public function reply(Request $request, $id)
    {
        $ticket = SupportTicket::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $request->validate([
            'message' => 'required|string',
        ]);

        $ticket->update([
            'status' => Status::TICKET_REPLY,
            'last_reply' => Carbon::now(),
        ]);

        SupportMessage::create([
            'support_ticket_id' => $ticket->id,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Reply sent successfully!');
    }

   public function close($id)
{
    $ticket = SupportTicket::where('id', $id)
        ->where('user_id', auth()->id())
        ->firstOrFail();

    $ticket->update(['status' => Status::TICKET_CLOSE]);

    return redirect()->route('user.ticket.index')
        ->with('success', 'Ticket closed successfully!');
}

}
