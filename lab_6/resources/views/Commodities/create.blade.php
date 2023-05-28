@extends('layouts.app')
@section('content')

<form action="{{URL::to('commodities')}}" method="post">
    @csrf
    <div class="ml-4">

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
            <label class="mr-2"> Price </label>
            <input name="price" type="number" min="0" class="border border-gray-600 rounded-3xl px-2">

            @error('price')
            <div class="text-xs text-red-700">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="my-2">
            <label class="mr-2"> Manufacturer </label>
            <input name="manufacturer" type="text" class="border border-gray-600 rounded-3xl px-2">

            @error('manufacturer')
            <div class="text-xs text-red-700">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="my-2">
            <select name="factory_id" class="border border-gray-600 rounded-3xl px-2">
                <option value="">Select factory code</option>
                @foreach ($factories as $factory)
                    <option>{{$factory->id}}</option>
                @endforeach
            </select>

            @error('factory_id')
            <div class="text-xs text-red-700">
                {{$message}}
            </div>
            @enderror

            <div>
                <input name="user_id" type="hidden" value="{{ auth()->id() }}">
            </div>
        </div>


        <button type="submit" class="px-5 border border-black rounded-2xl bg-green-400">
            Create
        </button>
    </div>
</form>
@endsection
