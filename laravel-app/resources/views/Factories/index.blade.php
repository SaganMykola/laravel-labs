<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Factories</title>

</head>

<body>
<div>
    <table>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Number of employees</th>
            <th>Area</th>
            <th>Address</th>
            <th>List of products</th>
        </tr>

        @foreach ($factories as $el)
            <tr>
                <td>{{ $el->id }}</td>
                <td>{{$el->name}}</td>
                <td>{{$el->number_of_employees}}</td>
                <td>{{$el->area}}</td>
                <td>{{$el->address}}</td>
                <td>
                    @foreach($commodities as $commodity)
                        @if($commodity->factory_id == $el->id)
                            <a href="{{URL::to('commodities') . '/' . $commodity->id}}">{{$commodity->name}}</a>
                            <br>
                        @endif
                    @endforeach
                </td>

                <td>
                    <form action="{{URL::to('factories') . '/' . $el->id}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit"> Delete</button>
                    </form>
                </td>
                <td>
                    <a href="{{URL::to('factories') . '/' . $el->id . '/edit'}}">
                        Edit
                    </a>
                </td>
            </tr>

        @endforeach
    </table>

    <a href="{{URL::to('factories') . '/create'}}"> Create new factory </a><br>
    <a href="{{URL::to('commodities') . '/create'}}"> Create new commodity </a>
</div>
</body>
</html>
