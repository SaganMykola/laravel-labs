<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use App\Models\Factory;
use Illuminate\Http\Request;

class CommodityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $factories = Factory::all();
        return view('commodities.create', compact('factories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $commodity = Commodity::create(
            $request->all(['name', 'price', 'manufacturer', 'factory_id'])
        );
        return view('commodities.store', compact('commodity'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $commodity = Commodity::find($id);
        return view('commodities.show', compact('commodity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $commodity = Commodity::find($id);
        return view('commodities.edit', compact('commodity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $commodity = Commodity::find($id);
        $commodity->name = $request->input('name');
        $commodity->price = $request->input('price');
        $commodity->manufacturer = $request->input('manufacturer');
        $commodity->factory_id = $request->input('factory_id');
        $commodity->save();
        return view('commodities.update', compact('commodity'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $commodity = Commodity::find($id);
        $commodity->delete();
        return view('commodities.destroy', compact('commodity'));
    }
}
