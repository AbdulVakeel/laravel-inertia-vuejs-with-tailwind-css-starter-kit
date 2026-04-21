<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\QueryBuilder\QueryBuilder;


class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        $data['columns'] = $columns = collect([
            ['key' => 'sr', 'label' => 'Sr.', 'sortable' => false, 'searchable' => false],
            ['key' => 'title', 'label' => 'Title', 'sortable' => true, 'searchable' => false, 'show' => true],
            ['key' => 'description', 'label' => 'Description', 'sortable' => false, 'searchable' => false, 'show' => true],
            ['key' => 'created_at', 'label' => 'Date',  'sortable' => true, 'searchable' => false],
            ['key' => 'actions', 'label' => 'Action', 'sortable' => false, 'searchable' => false, 'show' => true],
        ]);

        $data['faqs'] = Faq::get();

        $globalSearch = getGlobalSearchFilter(['title']);
        $data['search'] = $globalSearch;
        $data['perPage'] = getPaginate();
        $data['sort'] = 'id';
        $data['order'] = 'desc';
        $query = QueryBuilder::for(Faq::class)
     
            ->defaultSort('-id')
        ->allowedSorts($columns->map->key->all())
        ->allowedFilters([...$columns->map->key->all(), $globalSearch]);

        $data['items'] = $query->paginate(request()->perPage ?? getPaginate())->withQueryString();
         return Inertia::render('Admin/Faqs/Index', [
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $this->validation($request);
        $faq = new Faq();

        $this->saveData($faq, $request);

        $notify[] = ['success', 'Faq added successfully'];

        return redirect()->route('admin.faqs.index')
            ->with('success', $notify[0][1])
            ->withNotify($notify);
    }

    public function update(Request $request, $id)
    {
        $this->validation($request);
        $faq = Faq::findOrFail($id);
        $this->saveData($faq, $request);

        $notify[] = ['success', 'faq updated successfully'];

        return redirect()->route('admin.faqs.index')
            ->with('success', $notify[0][1])
            ->withNotify($notify);
    }

   
    protected function saveData($faq, $request)
    {
        $faq->title = $request->title;
        $faq->description = $request->description;
        return $faq->save();
    }

    protected function validation($request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
    }
}