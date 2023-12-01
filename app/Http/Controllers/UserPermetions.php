<?php

namespace App\Http\Controllers;

use App\Models\PermissionTable;
use App\Models\Role;
use App\Models\User;
use App\Models\userHasPermission;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\Datatables;

class UserPermetions extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::orderBy('id', 'DESC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('layouts.commonButton')->with([
                        'edit' => route('user-permeations.show', ['id' => $row->id]),
                        'delete' => $row->id
                    ]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $userList = User::all();
        return view('layouts.userPermetions.index', compact('userList'));
    }

    public function show($id)
    {
        $data = [
            "user" =>  User::find($id),
            "permetionList" =>  PermissionTable::all(),
            "roles" =>  Role::all(),
        ];
        return view('layouts.userPermetions.show')->with($data);
    }

    public function update(Request $request, $id)
    {

        if ($request->permission) {
            $permissionsToUpdate = [];
            foreach ($request->permission as $permissionTableId => $permission) {
                $permission_key = PermissionTable::where('id', $permissionTableId)->value('key');
                array_push($permissionsToUpdate,  [
                    'permission_key' => trim($permission_key),
                    'user_id' => $id,
                    'permission_table_id' => $permissionTableId,
                    'index' => isset($permission['index']),
                    'show' => isset($permission['show']),
                    'store' => isset($permission['store']),
                    'create' => isset($permission['create']),
                    'update' => isset($permission['update']),
                    'edit' => isset($permission['edit']),
                    'destroy' => isset($permission['destroy']),
                ]);
                // $user->permissionTables()->sync($permissionsToUpdate);

            }
            // $user = User::findOrFail($id);
            userHasPermission::where('user_id', $id)->delete();
            userHasPermission::insert(
                $permissionsToUpdate
            );
        } else {
            userHasPermission::where('user_id', $id)->delete();
        }


        return redirect()->back()->withSuccess('User permission updated successful!');
    }
}
