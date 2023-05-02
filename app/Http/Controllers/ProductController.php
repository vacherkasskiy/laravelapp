<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

// all methods for "../products/.." events
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::all();

        $search = $request->input('search');

        if(!empty($search)) {
            $products = Product::where('article', 'like', "%{$search}%")
                ->get();
        }

        session()->put('products', $products);
        return view('shop.main', compact('products'))
            ->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
           'article' => 'required|string|max:255',
           'description' => 'string|max:255',
           'category' => 'required|string|max:255',
           'price' => 'required|numeric',
           'picturesource' => 'required|string|max:255'
        ]);

        $product = Product::create($validated);

        return redirect()->to('/shop');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show')
            ->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit')
            ->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'article' => 'required|string|max:255',
            'description' => 'string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric',
            'picturesource' => 'required|string|max:255'
        ]);

        $product->update($validated);

        return redirect()->to('/shop');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->to('/shop');
    }
}
