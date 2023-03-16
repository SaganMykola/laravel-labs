<form action="{{URL::to('commodities') .'/' . $commodity->id}}" method="post">
    @csrf
    <input type="hidden" name="_method" value="PATCH">
    <label> Name </label>
    <input name="name" type="text" value="{{$commodity->name}}">
    <br>

    <label> Price </label>
    <input name="price" type="number" min="0" value="{{$commodity->price}}">
    <br>

    <label> Manufacturer </label>
    <input name="manufacturer" type="text" value="{{$commodity->manufacturer}}">
    <br>

    <input name="factory_id" type="hidden" min="0" value="{{$commodity->factory_id}}">

    <button type="submit">
        Edit
    </button>
</form>
