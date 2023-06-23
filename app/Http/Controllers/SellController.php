<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Product;
use App\Models\Sell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sells = Sell::all();
        $employees = Employee::all();

        return view('pages.sell.index', [
            'sells' => $sells,
            'employees' => $employees ,
            'title' => 'Transaction'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sells = Sell::all();
        $employees = Employee::all();
        $products = Product::all();

        return view('pages.sell.create', [
            'sells' => $sells,
            'employees' => $employees,
            'products' => $products,
            'title' => 'Transaction'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data ['karyawan_id'] = Auth::user()->id;

        $product = Product::findOrFail($request->product_id);

        if ($request->qty > $product->stok) {
            return back()->withInput($request->except('qty'))->with('error', 'Quantity melebihi stock, stock sekarang adalah:' . $product->stok);
        }

        // UNTUK MENGUPDATE STOCK
        $update_product['stok'] = $product->stok - $request->qty;
        $product->update($update_product);

        Sell::create($data);
        return redirect()->route('sell.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sell $sell)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sell $sell)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sell $sell)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {


        Sell::findOrFail($id)->delete();
        return redirect()->route('sell.index');
    }
}
