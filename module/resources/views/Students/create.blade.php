@extends('layouts.app')
@section('content')

    <form action="{{URL::to('students')}}" method="post">
        @csrf
        <div class="mx-4">
            <div class="my-2">
                <label class="mr-2"> Name </label>
                <input name="name" type="text" class="border border-gray-600 rounded-3xl px-2">
            </div>

            <div class="my-2">
                <label class="mr-2"> Course </label>
                <input name="course" type="number" min="0" class="border border-gray-600 rounded-3xl px-2">
            </div>

            <div class="my-2">
                <label class="mr-2"> Specialty </label>
                <input name="specialty" type="text" class="border border-gray-600 rounded-3xl px-2">
            </div>
            <div>
                <input name="user_id" type="hidden" value="{{ auth()->id() }}">
            </div>

            <button type="submit" class="px-5 border border-black rounded-2xl bg-green-400">
                Create
            </button>
        </div>
    </form>

@endsection
