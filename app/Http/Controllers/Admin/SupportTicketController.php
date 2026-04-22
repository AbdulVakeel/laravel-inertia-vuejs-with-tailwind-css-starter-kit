<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SupportTicket;
use App\Models\SupportMessage;
use App\Constants\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\QueryBuilder\QueryBuilder;

class SupportTicketController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = "Support Tickets";

        $data['columns'] = $columns = collect([
            ['key' => 'sr', 'label' => 'SN', 'sortable' => false, 'searchable' => false],
            ['key' => 'ticket', 'label' => 'Ticket', 'sortable' => true, 'searchable' => true],
            ['key' => 'name', 'label' => 'User Name', 'sortable' => true, 'searchable' => true],
            // ['key' => 'subject', 'label' => 'Subject', 'sortable' => true, 'searchable' => true],
            ['key' => 'priority', 'label' => 'Priority', 'sortable' => true, 'searchable' => false],
            ['key' => 'status', 'label' => 'Status', 'sortable' => true, 'searchable' => false],
            ['key' => 'last_reply', 'label' => 'Last Reply', 'sortable' => true, 'searchable' => false],
            ['key' => 'created_at', 'label' => 'Created Date', 'sortable' => true, 'searchable' => false],
            ['key' => 'actions', 'label' => 'Actions', 'sortable' => false, 'searchable' => false],
        ]);

        $globalSearch = getGlobalSearchFilter(['ticket','subject','name']);

        // $query = QueryBuilder::for(SupportTicket::class)
        //     ->defaultSort('-id')
        //     ->allowedSorts($columns->pluck('key')->all())
        //     ->allowedFilters([...$columns->pluck('key')->all(), $globalSearch])
        //     ->with('user');


        $query = QueryBuilder::for(SupportTicket::class)
            // ->with('investment')
            ->with('user')
            // ->dateFilter('invests.created_at')
            ->defaultSort('-created_at')
            ->allowedSorts($columns->map->key->all())
            ->allowedFilters([...$columns->map->key->all(), $globalSearch])
            ->when(request()->get('scope'), function ($query, $scope) {
                if (method_exists(SupportTicket::class, 'scope' . ucfirst($scope))) {
                    $query->$scope();
                }
            });
            // ->paginate(request()->perPage ?? getPaginate())
            // ->withQueryString();

        $data['items'] = $query->paginate(request()->perPage ?? getPaginate())->withQueryString();
        $data['statusCounts'] = [
    'all' => SupportTicket::count(),
    'open' => SupportTicket::statusOpen()->count(),
    'answered' => SupportTicket::statusAnswered()->count(),
    'replied' => SupportTicket::statusReplied()->count(),
    'closed' => SupportTicket::statusClosed()->count(),
];

        return Inertia::render('Admin/Ticket/Index', ['data' => $data]);
    }

    public function view($id)
    {
                $data['pageTitle'] = "Support Tickets";

        $ticket = SupportTicket::with('user')->findOrFail($id);
        $messages = SupportMessage::with('attachments')->where('support_ticket_id', $ticket->id)->latest()->get();

        return Inertia::render('Admin/Ticket/View', [
            'ticket'   => $ticket,
            'messages' => $messages,
            'data' => $data,
        ]);
    }

    public function reply(Request $request, $id)
    {
                $data['pageTitle'] = "Support Tickets";

        $ticket = SupportTicket::findOrFail($id);

        $request->validate(['message' => 'required|string']);

        $ticket->update(['status' => Status::TICKET_ANSWER, 'last_reply' => Carbon::now()]);

        SupportMessage::create([
            'support_ticket_id' => $ticket->id,
            'admin_id' => auth()->id(),
            'message' => $request->message,
            'data' => $data,
        ]);

        return back()->with('success', 'Reply sent successfully!');
    }

    public function close($id)
    {
                $data['pageTitle'] = "Support Tickets";

        $ticket = SupportTicket::findOrFail($id);
        $ticket->update(['status' => Status::TICKET_CLOSE]);

          return redirect()->route('admin.ticket.index')
        ->with('success', 'Ticket closed successfully!');

    }
}
