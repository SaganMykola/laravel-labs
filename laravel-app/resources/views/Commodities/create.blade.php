<form action="{{URL::to('commodities')}}" method="post">
    @csrf
    <label> Name </label>
    <input name="name" type="text">
    <br>

    <label> Price </label>
    <input name="price" type="number" min="0">
    <br>

    <label> Manufacturer </label>
    <input name="manufacturer" type="text">
    <br>

    <select>
        <option value="">Select factory code</option>
        @foreach ($factories as $factory)
            <option>{{$factory->id}}</option>
        @endforeach
    </select>
    <br>

    <button type="submit">
        Create
    </button>
</form>
