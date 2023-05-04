<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use App\Models\Factory;
use Illuminate\Http\Request;
use App\Http\Requests\FactoryRequest;
use Illuminate\Support\Facades\Gate;

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
    public function store(FactoryRequest $request)
    {
        $validated = $request->validated();
        $factory = Factory::create(
           $validated
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
        if (! Gate::allows('edit-factory', $factory)) {
            abort(403, "no access");
        }
        return view('factories.edit', compact('factory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FactoryRequest $request, string $id)
    {
        $validated = $request->validated();
        $factory = Factory::find($id);
        $factory->name =  $validated['name'];
        $factory->number_of_employees =  $validated['number_of_employees'];
        $factory->area =  $validated['area'];
        $factory->address =  $validated['address'];
        $factory->user_id = $validated['user_id'];
        $factory->save();

        return \redirect('factories');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $factory = Factory::find($id);

        if (! Gate::allows('delete-factory', $factory)) {
            abort(403, "Not allowed by gate");
        }

        $factory->delete();
        return \redirect('factories');
    }
}
