<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UserHasRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\Datatables;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::with('roles')->orderBy('id', 'DESC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('layouts.commonButton')->with([
                        'edit' => route('user.edit', ['user' => $row->id]),
                        'delete' => $row->id
                    ]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('layouts.users.index');
    }

    public function create()
    {
        $data = [
            "user" => null,
            "roles" => Role::all(),
        ];
        return view('layouts.users.form')->with($data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        User::create([
            'name' => $validated['name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect('/user')->with('msg', 'New User Created successful!');
    }

    public function show(User $user)
    {
        return view('layouts.users.form', compact('user'));
    }

    public function edit(User $user)
    {
        $data = [
            "user" => $user,
            "roles" => Role::all(),
        ];

        return view('layouts.users.form')->with($data);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            "name" => "required",
            "address" => "nullable",
            "last_name" => "nullable",
            "email" => "nullable",
            "role" => "nullable",
            "password" => "nullable",
        ]);

        $user->update($validated);
        UserHasRole::updateOrCreate(
            ['user_id' => $user->id],
            ['role_id' => $validated['role']]
        );
        $msg = "User Updated successful! ";
        return redirect('/user')->with('msg', $msg);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'status' => true,
        ], 200);
    }
}
