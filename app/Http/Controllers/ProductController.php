<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category', 'supplier')->get();

        return view('pages.product.index', [
            'products' => $products,
            'title' => 'All product'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('pages.product.create', [
            'categories' => $categories,
            'suppliers' => $suppliers,
            'title' => 'Create Product'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['cover'] = $request->file('cover')->store('product', 'public');

        Product::create($data);
        return redirect()->route('produk.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = Product::findOrFail($id);

        return view('pages.product.show', [
            'item' => $item,
            'title' => 'Detail Karyawan'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $items = Product::findOrFail($id);
        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('pages.product.edit', [
            'title' => 'Edit Data',
            'categories' => $categories,
            'suppliers' => $suppliers,
            'items' => $items
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        if(!empty($data['cover'])) {
            $data['cover'] = $request->file('cover')->store('product', 'public');
        }else{
            unset($data['cover']);
        }

        Product::findOrFail($id)->update($data);

        return redirect()->route('produk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('produk.index');
    }
}
