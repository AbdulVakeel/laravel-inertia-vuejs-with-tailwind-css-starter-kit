<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\QueryBuilder\QueryBuilder;

class InvestmentController extends Controller
{
   
    public function index()
    {
        $data['columns'] = $columns = collect([
            ['key' => 'sr', 'label' => 'Sr.'],
            ['key' => 'name', 'label' => 'Name', 'sortable' => true],
            ['key' => 'amount', 'label' => 'Amount', 'sortable' => true],
            ['key' => 'status', 'label' => 'Status'],
            ['key' => 'created_at', 'label' => 'Created Date'],
            ['key' => 'actions', 'label' => 'Action'],
        ]);

        $data['pageTitle'] = "Membership Plans";

        $data['investments'] = Investment::latest()->get();

        $globalSearch = getGlobalSearchFilter(['name', 'amount']);

        $query = QueryBuilder::for(Investment::class)
            ->defaultSort('id')
            ->allowedSorts($columns->pluck('key')->all())
            ->allowedFilters([...$columns->pluck('key')->all(), $globalSearch]);

        $data['items'] = $query
            ->paginate(request()->perPage ?? getPaginate())
            ->withQueryString();

        return Inertia::render('Admin/Investment/Index', [
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required',
            'amount' => 'required|numeric|gt:0',
        ]);

        Investment::create([
            'name'   => $request->name,
            'amount' => $request->amount,
            'status' => 1,
        ]);

        return back()->with('success', 'Plan added successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'   => 'required',
            'amount' => 'required|numeric|gt:0',
        ]);

        $investment = Investment::findOrFail($id);

        $investment->update([
            'name'   => $request->name,
            'amount' => $request->amount,
        ]);

        return back()->with('success', 'Plan updated successfully');
    }

    public function status($id)
    {
        $investment = Investment::findOrFail($id);

        $investment->status = $investment->status == 1 ? 0 : 1;
        $investment->save();

        return back()->with(
            'success',
            $investment->status ? 'Plan Activated' : 'Plan Deactivated'
        );
    }

    public function delete($id)
    {
        Investment::findOrFail($id)->delete();

        return back()->with('success', 'Plan deleted successfully');
    }
}