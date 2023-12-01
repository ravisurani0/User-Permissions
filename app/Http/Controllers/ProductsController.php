<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\Datatables;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Products::orderBy('id', 'DESC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('layouts.commonButton')->with([
                        'edit' => route('products.edit', ['product' => $row->id]),
                        'delete' => $row->id
                    ]);
                    // $actionBtn = '
                    // <a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    // return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('layouts.products.index');
    }

    public function create()
    {
        return view('layouts.products.form')->with('product', null);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required",
            "quantity" => "required",
            "price" => "required",
            "detail" => "nullable",
        ]);

        Products::create($validated);

        return redirect('/products')->withSuccess('New Products Created successful!');
    }

    public function show(Products $product)
    {
        return view('layouts.products.form', compact('product'));
    }

    public function edit(Products $product)
    {
        return view('layouts.products.form', compact('product'));
    }

    public function update(Request $request, Products $product)
    {
        $validated = $request->validate([
            "name" => "required",
            "quantity" => "required",
            "price" => "required",
            "detail" => "nullable",
        ]);
        $product->update($validated);
        return redirect('/products')->withSuccess('Products Updated successful!');
    }

    public function destroy(Products $product)
    {
        $product->delete();
        return response()->json([
            'status' => true,
        ], 200);
    }
}
