<form action="{{URL::to('factories') .'/' . $factory->id}}" method="post">
    @csrf
    <input type="hidden" name="_method" value="PATCH">
    <label> Name </label>
    <input name="name" type="text" value="{{$factory->name}}">
    <br>

    <label> Number of employees </label>
    <input name="number_of_employees" type="number" min="0" value="{{$factory->number_of_employees}}">
    <br>

    <label> Area </label>
    <input name="area" type="text" value="{{$factory->area}}">
    <br>

    <label> Address </label>
    <input name="address" type="text" value="{{$factory->address}}">
    <br>
    <button type="submit">
        Edit
    </button>
</form>
