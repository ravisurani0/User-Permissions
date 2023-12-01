<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\Datatables;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Employee::orderBy('id', 'DESC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('layouts.commonButton')->with([
                        'edit' => route('employee.edit', ['employee' => $row->id]),
                        'delete' => $row->id
                    ]);
                    // $actionBtn = '
                    // <a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    // return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        // $data = [
        //     "employeeList" => Employee::all(),
        // ];
        return view('layouts.employees.index');
    }

    public function create()
    {
        $employee =  null;

        return view('layouts.employees.form', compact('employee'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required",
            "position" => "required",
            "office" => "required",
            "age" => "required",
            "startdate" => "required",
            "salary" => "required",
        ]);

        Employee::create($validated);
        return redirect('/employee')->withSuccess('New Employee Created successful!');
    }

    public function show(Employee $employee)
    {
        $data = [
            "employee" => $employee
        ];

        return view('layouts.employees.form')->with($data);
    }

    public function edit(Employee $employee)
    {
        $data = [
            "employee" => $employee
        ];

        return view('layouts.employees.form')->with($data);
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            "name" => "required",
            "position" => "required",
            "office" => "required",
            "age" => "required",
            "startdate" => "required",
            "salary" => "required",
        ]);
        $employee->update($validated);

        return redirect('/employee')->withSuccess('Employee Updated successful!');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return response()->json([
            'status' => true,
        ], 200);
        // Employee::where('id', $employeeId)->delete();
        // return redirect('/employee')->withSuccess('Employee Deleted successful! ');
    }
}
