<div>
    <p>Name: {{$commodity->name}}</p>
    <p>Price: {{$commodity->price}}</p>
    <p>Manufacturer: {{$commodity->manufacturer}}</p>

    <form action="{{URL::to('commodities') . '/' . $commodity->id}}" method="post">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit"> Delete</button>
    </form>

    <a href="{{URL::to('commodities') . '/' . $commodity->id . '/edit'}}">
        Edit
    </a><br>

    <a href="{{URL::to('factories')}}">Return</a>
</div>
