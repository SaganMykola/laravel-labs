@extends('layouts.app')
@section('content')

<form action="{{URL::to('commodities') .'/' . $commodity->id}}" method="post">
    @csrf
    <div class="ml-4">

        <input type="hidden" name="_method" value="PATCH">

        <div class="my-2">
            <label class="mr-2"> Name </label>
            <input name="name" type="text" value="{{$commodity->name}}" class="border border-gray-600 rounded-3xl px-2">

            @error('name')
            <div class="text-xs text-red-700">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="my-2">
            <label class="mr-2"> Price </label>
            <input name="price" type="number" min="0" value="{{$commodity->price}}" class="border border-gray-600 rounded-3xl px-2">

            @error('price')
            <div class="text-xs text-red-700">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="my-2">
            <label class="mr-2"> Manufacturer </label>
            <input name="manufacturer" type="text" value="{{$commodity->manufacturer}}" class="border border-gray-600 rounded-3xl px-2">

            @error('manufacturer')
            <div class="text-xs text-red-700">
                {{$message}}
            </div>
            @enderror
        </div>

        <input name="factory_id" type="hidden" value="{{$commodity->factory_id}}">

        <button type="submit" class="px-5 border border-black rounded-2xl bg-green-400">
            Edit
        </button>
    </div>
</form>

@endsection
