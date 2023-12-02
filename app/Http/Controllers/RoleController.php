<?php

namespace App\Http\Controllers;

use App\Models\role;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\Datatables;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Role::orderBy('id', 'DESC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('layouts.commonButton')->with([
                        'edit' => route('roles.edit', ['role' => $row->id]),
                        // 'delete' => $row->id
                    ]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('layouts.Roles.index');;
    }

    public function create()
    {
        return view('layouts.Roles.form')->with('role', null);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|unique:roles",
        ]);
        $validated['key'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));

        Role::create($validated);

        return redirect('/roles')->withSuccess('New Roles Created successful!');
    }

    public function show(Role $role)
    {
        return view('layouts.Roles.form', compact('role'));
    }

    public function edit(Role $role)
    {
        return view('layouts.Roles.form', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            "name" => "required",
        ]);
        $validated['key'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));

        $role->update($validated);

        return redirect('/roles')->withSuccess('Roles Updated successful!');
    }

    public function destroy(Role $role)
    {
        // count($role->roleHasPermissions) || count($role->users)
        if (count($role->users)) {
            return response()->json([
                'message' => 'Can`t delete Role, Role is Assigned to User.',
                'status' => false,
            ], 200);
        }
        $role->delete();

        return response()->json([
            'status' => true,
        ], 200);
    }
}
