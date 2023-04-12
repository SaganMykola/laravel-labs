<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use App\Models\Factory;
use Illuminate\Http\Request;
use App\Http\Requests\CommodityRequest;

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
    public function store(CommodityRequest $request)
    {
        $validated = $request->validated();
        $commodity = Commodity::create(
            $validated
        );
        return \redirect('factories');
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
    public function update(CommodityRequest $request, string $id)
    {
        $validated = $request->validated();
        $commodity = Commodity::find($id);
        $commodity->name = $validated['name'];
        $commodity->price = $validated['price'];
        $commodity->manufacturer = $validated['manufacturer'];
        $commodity->factory_id = $validated['factory_id'];
        $commodity->save();
        return \redirect('commodities' . '/' . $commodity->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $commodity = Commodity::find($id);
        $commodity->delete();
        return \redirect('factories');
    }
}
