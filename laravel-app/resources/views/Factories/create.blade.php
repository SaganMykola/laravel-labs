@extends('layouts.app')
@section('content')

<form action="{{URL::to('factories')}}" method="post">
    @csrf
    <div class="mx-4">
        <div class="my-2">
            <label class="mr-2"> Name </label>
            <input name="name" type="text" class="border border-gray-600 rounded-3xl px-2">

            @error('name')
            <div class="text-xs text-red-700">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="my-2">
            <label class="mr-2"> Number of employees </label>
            <input name="number_of_employees" type="number" min="0" class="border border-gray-600 rounded-3xl px-2">

            @error('number_of_employees')
            <div class="text-xs text-red-700">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="my-2">
            <label class="mr-2"> Area </label>
            <input name="area" type="text" class="border border-gray-600 rounded-3xl px-2">

            @error('area')
            <div class="text-xs text-red-700">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="my-2">
            <label class="mr-2"> Address </label>
            <input name="address" type="text" class="border border-gray-600 rounded-3xl px-2">

            @error('address')
            <div class="text-xs text-red-700">
                {{$message}}
            </div>
            @enderror
        </div>

        <button type="submit" class="px-5 border border-black rounded-2xl bg-green-400">
            Create
        </button>
    </div>
</form>

@endsection
