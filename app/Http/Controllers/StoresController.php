<?php

namespace App\Http\Controllers;

use App\Models\Stores;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\Datatables;

class StoresController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Stores::orderBy('id', 'DESC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('layouts.commonButton')->with([
                        'edit' => route('stores.edit', ['store' => $row->id]),
                        'delete' => $row->id
                    ]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('layouts.store.index');
    }

    public function create()
    {
        return view('layouts.store.form')->with('store', null);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required",
            "address" => "nullable"
        ]);

        Stores::create($validated);

        return redirect('/stores')->withSuccess('New Stores Created successful!');
    }

    public function show(Stores $store)
    {
        return view('layouts.store.form', compact('store'));
    }

    public function edit(Stores $store)
    {
        return view('layouts.store.form', compact('store'));
    }

    public function update(Request $request, Stores $store)
    {
        $validated = $request->validate([
            "name" => "required",
            "address" => "nullable"
        ]);

        $store->update($validated);

        return redirect('/stores')->withSuccess('Stores Updated successful!');
    }

    public function destroy(Stores $store)
    {
        $store->delete();
        return response()->json([
            'status' => true,
        ], 200);
    }
}
