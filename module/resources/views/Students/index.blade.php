@extends('layouts.app')
@section('content')
<div class="ml-4">
    <table class="border border-black">
        <tr class="border border-black color bg-gray-200">
            <th class="border border-black px-5">Code</th>
            <th class="border border-black px-5">Name</th>
            <th class="border border-black px-5">Number of employees</th>
            <th class="border border-black px-5">Area</th>
            <th class="border border-black px-5">Address</th>
            <th class="border border-black px-5">List of products</th>
        </tr>

        @foreach ($students as $student)
            <tr class="border border-black">
                <td class="border border-black px-5">{{$student->id }}</td>
                <td class="border border-black px-5">{{$student->name}}</td>
                <td class="border border-black px-5">{{$student->course}}</td>
                <td class="border border-black px-5">{{$student->specialty}}</td>
                <td class="border border-black px-5">
                    @foreach($progress as $el)
                        @if($el->student_id == $student->id)
                            <a href="{{URL::to('$students') . '/' . $progress->id}}" class="text-blue-700">{{$el->subject}}</a>
                            <br>
                        @endif
                    @endforeach
                </td>

                <td class="border border-black px-5">
                    <form action="{{URL::to('students') . '/' . $student->id}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="px-5 border border-black rounded-2xl bg-red-500"> Delete</button>
                    </form>
                </td>
                <td class="border border-black px-5">
                    <a href="{{URL::to('students') . '/' . $student->id . '/edit'}}" class="px-5 border border-black rounded-2xl bg-blue-400">>
                        Edit
                    </a>
                </td>
            </tr>

        @endforeach
    </table>

    <a href="{{URL::to('students') . '/create'}}" class="px-5 border border-black rounded-2xl bg-blue-400"> Create new student </a><br>
    <a href="{{URL::to('progress') . '/create'}}" class="px-5 border border-black rounded-2xl bg-blue-400"> Create new progress </a>
</div>
@endsection
