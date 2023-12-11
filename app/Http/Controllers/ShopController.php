<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shops = Shop::all();
        return view('shop.index', ['shops' => $shops]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('shop.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'website' => 'nullable|string',
            'contact' => 'required',
            'address' => 'required|string',
            'description' => 'required|string',
        ]);

        $data = $request->except('_token');

        Shop::create($data);

        return redirect()->route('shops.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $shop = Shop::findOrFail($id);

        return view('shop.edit', compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shop $shop)
    {
        $request->validate([
            'name' => 'required|string',
            'website' => 'nullable|string',
            'contact' => 'required',
            'address' => 'required|string',
            'description' => 'required|string',
        ]);

        $data = $request->all();

        $shop->update($data);

        return redirect()->route('shops.index')->withMessage('Shop has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop)
    {
        $shop->delete();
        return redirect()->route('shop' )->withMessage('Shop has been Deleted');
    }
}
