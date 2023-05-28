@extends('layouts.app')
@section('content')

<div class="mx-2">
    <p class="mb-2 mr-2">Name: {{$commodity->name}}</p>
    <p class="mb-2 mr-2">Price: {{$commodity->price}}</p>
    <p class="mb-2 mr-2">Manufacturer: {{$commodity->manufacturer}}</p>

    <form action="{{URL::to('commodities') . '/' . $commodity->id}}" method="post">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" class="px-5 border border-black rounded-2xl bg-red-500"> Delete</button>
    </form>

    <div class="my-2">
        <a href="{{URL::to('commodities') . '/' . $commodity->id . '/edit'}}" class="px-5 border border-black rounded-2xl bg-blue-400">
            Edit
        </a>
    </div>
    <div>
        <a href="{{URL::to('factories')}}" class="px-5 border border-black rounded-2xl bg-blue-400">Return</a>
    </div>
</div>
@endsection
