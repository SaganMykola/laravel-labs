@extends('layouts.app')
@section('content')

    <form action="{{URL::to('students') .'/' . $student->id}}" method="post">
        @csrf
        <div class="ml-4">
            <input type="hidden" name="_method" value="PATCH">

            <div class="my-2">
                <label class="mr-2"> Name </label>
                <input name="name" type="text" value="{{$student->name}}" class="border border-gray-600 rounded-3xl px-2">
            </div>

            <div class="my-2">
                <label class="mr-2"> Course </label>
                <input name="course" type="number" min="0" value="{{$student->course}}" class="border border-gray-600 rounded-3xl px-2">
            </div>

            <div class="my-2">
                <label class="mr-2"> Specialty </label>
                <input name="specialty" type="text" value="{{$student->specialty}}" class="border border-gray-600 rounded-3xl px-2">
            </div>

            <button type="submit" class="px-5 border border-black rounded-2xl bg-green-400">
                Edit
            </button>

        </div>
    </form>
@endsection
