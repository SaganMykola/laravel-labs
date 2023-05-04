@extends('layouts.app')
@section('content')

<form action="{{URL::to('factories') .'/' . $factory->id}}" method="post">
    @csrf
    <div class="ml-4">
        <input type="hidden" name="_method" value="PATCH">

        <div class="my-2">
            <label class="mr-2"> Name </label>
            <input name="name" type="text" value="{{$factory->name}}" class="border border-gray-600 rounded-3xl px-2">

            @error('name')
            <div class="text-xs text-red-700">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="my-2">
            <label class="mr-2"> Number of employees </label>
            <input name="number_of_employees" type="number" min="0" value="{{$factory->number_of_employees}}" class="border border-gray-600 rounded-3xl px-2">

            @error('number_of_employees')
            <div class="text-xs text-red-700">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="my-2">
            <label class="mr-2"> Area </label>
            <input name="area" type="text" value="{{$factory->area}}" class="border border-gray-600 rounded-3xl px-2">

            @error('area')
            <div class="text-xs text-red-700">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="my-2">
            <label class="mr-2"> Address </label>
            <input name="address" type="text" value="{{$factory->address}}" class="border border-gray-600 rounded-3xl px-2">

            @error('address')
            <div class="text-xs text-red-700">
                {{$message}}
            </div>
            @enderror
        </div>

        <button type="submit" class="px-5 border border-black rounded-2xl bg-green-400">
            Edit
        </button>

    </div>
</form>
@endsection
