<?php

namespace App\Http\Controllers;

use App\Models\PermissionTable;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\Datatables;

class PermissionTableController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = PermissionTable::orderBy('id', 'DESC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('layouts.commonButton')->with([
                        'edit' => route('permission-table.edit', ['permission_table' => $row->id]),
                        // 'delete' => $row->id
                    ]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('layouts.PermissionTable.index');
    }

    public function create()
    {
        return view('layouts.PermissionTable.form')->with('permissionTable', null);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|unique:permission_tables",
        ]);
        $validated['key'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));
        PermissionTable::create($validated);

        return redirect('/permission-table')->withSuccess('New Permission Created successful!');
    }

    public function show(PermissionTable $permissionTable)
    {
        return view('layouts.PermissionTable.form', compact('permissionTable'));
    }

    public function edit(PermissionTable $permissionTable)
    {
        return view('layouts.PermissionTable.form', compact('permissionTable'));
    }

    public function update(Request $request, PermissionTable $permissionTable)
    {
        $validated = $request->validate([
            "name" => "required",
        ]);
        $validated['key'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));

        $permissionTable->update($validated);

        return redirect('/permission-table')->withSuccess('Permission Updated successful!');
    }

    public function destroy(PermissionTable $permissionTable)
    {
        $permissionTable->delete();

        return response()->json([
            'status' => true,
        ], 200);
    }
}
