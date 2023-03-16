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

    <label> Factory id </label>
    <input name="factory_id" type="number">
    <br>

    <button type="submit">
        Create
    </button>
</form>
