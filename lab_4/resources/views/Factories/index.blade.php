@extends('layouts.app')
@section('content')

{{--@if(Auth::user()->role == 'moderator')--}}
    <div class="flex justify-end max-w-7xl">
        <x-role-transfer>
            <x-slot name="button">
                <button>
                    Button
                </button>
            </x-slot>

            <x-slot name="users">
                @foreach($users as $user)
                    <form  method="POST" action="{{route('users.update', $user->id)}}">
                        @csrf
                        @if($user->role != 'moderator')
                            <input type="hidden" name="role" value="moderator">

                            <button type="submit">
                                {{$user->role}}
                            </button>
                        @endif
                    </form>
                @endforeach
            </x-slot>
        </x-role-transfer>
    </div>
{{--@endif--}}

<div class="ml-4 align-baseline">
    <table class="border border-black">
        <tr class="border border-black color bg-gray-200">
            <th class="border border-black px-5">Code</th>
            <th class="border border-black px-5">Name</th>
            <th class="border border-black px-5">Number of employees</th>
            <th class="border border-black px-5">Area</th>
            <th class="border border-black px-5">Address</th>
            <th class="border border-black px-5">List of products</th>
        </tr>

        @foreach ($factories as $el)
            <tr class="border border-black">
                <td class="border border-black px-5">{{ $el->id }}</td>
                <td class="border border-black px-5">{{$el->name}}</td>
                <td class="border border-black px-5">{{$el->number_of_employees}}</td>
                <td class="border border-black px-5">{{$el->area}}</td>
                <td class="border border-black px-5">{{$el->address}}</td>
                <td class="border border-black px-5">
                    @foreach($commodities as $commodity)
                        @if($commodity->factory_id == $el->id)
                            <a href="{{URL::to('commodities') . '/' . $commodity->id}}" class="text-blue-700">{{$commodity->name}}</a>
                            <br>
                        @endif
                    @endforeach
                </td>

                <td class="border border-black">
                    <form action="{{URL::to('factories') . '/' . $el->id}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="px-5 border border-black rounded-2xl bg-red-500"> Delete</button>
                    </form>
                </td>
                <td class="border border-black">
                    <a href="{{URL::to('factories') . '/' . $el->id . '/edit'}}"
                       class="px-5 border border-black rounded-2xl bg-blue-400">
                        Edit
                    </a>
                </td>
            </tr>

        @endforeach
    </table>
    <div class="my-5">
        <a href="{{URL::to('factories') . '/create'}}" class="px-5 border border-black rounded-2xl bg-blue-400"> Create new factory </a><br>
    </div>

    <div>
        <a href="{{URL::to('commodities') . '/create'}}" class="px-5 border border-black rounded-2xl bg-blue-400"> Create new commodity </a>
    </div>
</div>


@endsection
