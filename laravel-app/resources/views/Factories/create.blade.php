<form action="{{URL::to('factories')}}" method="post">
    @csrf
    <label> Name </label>
    <input name="name" type="text">
    <br>

    <label> Number of employees </label>
    <input name="number_of_employees" type="number" min="0">
    <br>

    <label> Area </label>
    <input name="area" type="text">
    <br>

    <label> Address </label>
    <input name="address" type="text">
    <br>

    <button type="submit">
        Create
    </button>
</form>
