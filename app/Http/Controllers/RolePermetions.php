<?php

namespace App\Http\Controllers;

use App\Models\PermissionTable;
use App\Models\Role;
use App\Models\roleHasPermissions;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\Datatables;

class RolePermetions extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Role::orderBy('id', 'DESC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('layouts.commonButton')->with([
                        'edit' => route('role-permeations.show', ['id' => $row->id]),
                    ]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('layouts.rollPermetions.index');
    }

    public function show($id)
    {
        $data = [
            "roleDetails" =>  Role::find($id),
            "permetionList" =>  PermissionTable::all(),
        ];
        return view('layouts.rollPermetions.show')->with($data);
    }

    public function update(Request $request, $id)
    {
        if ($request->permission) {
            $permissionsToUpdate = [];
            foreach ($request->permission as $permissionTableId => $permission) {
                $permissionsToUpdate[$permissionTableId] = [
                    'permission_key' => PermissionTable::where('id', $permissionTableId)->value('key'),
                    "index" => isset($permission["index"]),
                    "show" => isset($permission["show"]),
                    "store" => isset($permission["create"]),
                    "create" => isset($permission["create"]),
                    "update" => isset($permission["edit"]),
                    "edit" => isset($permission["edit"]),
                    "destroy" => isset($permission["destroy"]),
                ];
                $role = Role::findOrFail($id);
                $role->permissionTables()->sync($permissionsToUpdate);
            }
        } else {
            roleHasPermissions::where('user_id', $id)->delete();
        }

        return redirect()->back()->withSuccess('Role permission updated successful!');
    }

    public function userRoleindex()
    {
        $userList = User::all();
        return view('layouts.userPermetions.index', compact('userList'));
    }
}
