<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use App\Models\Factory;
use Illuminate\Http\Request;

class FactoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $factories = Factory::all();
        $commodities = Commodity::all();
        return view('factories.index', compact('factories', 'commodities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('factories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $factory = Factory::create(
            $request->all(['name', 'number_of_employees', 'area', 'address'])
        );
        return \redirect('factories');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $factory = Factory::find($id);
        return view('factories.edit', compact('factory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $factory = Factory::find($id);
        $factory->name = $request->input('name');
        $factory->number_of_employees = $request->input('number_of_employees');
        $factory->area = $request->input('area');
        $factory->address = $request->input('address');
        $factory->save();

        return \redirect('factories');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $factory = Factory::find($id);
        $factory->delete();
        return \redirect('factories');
    }
}
