<h1>Pimp my ride</h1>
<p>Hello, {{ $user->name }}!</p>

<h2>Add your car</h2>

@include('errors')
<form method="POST" action="/cars" >
    @csrf
        <label for="car_description">Your car</label>
        <input type="text" name="car_description" id="car_description">
        <button type="submit">Add car</button>
</form>


        @foreach($user->cars as $car)
        <div>
            <h2>{{ $car->car_description }}</h2>
            <form method="POST" action="/features" >
                @csrf
                <input type="hidden" id="car_id" name="car_id" value="{{ $car->id }}">
                    <label for="description">Feature description</label>
                    <input type="text" name="description" id="description">
                    <button type="submit">Add feature</button>
                </form>
                <form action="/cars/{{$car->id}}/delete" method="post">
                    @csrf
                    @method('patch')

                    <button type="submit">Delete</button>
                </form>
        </div>
        <div>
            <ul>
                @foreach($car->features as $feature)
                <li>
                @if($feature->completed)
                    <s>{{ $feature->description }}</s>
                    @else
                    <form action="/features/{{$feature->id}}/complete" method="post">
                        @csrf
                        @method('patch')
                        {{ $feature->description }}
                        <button type="submit">Complete</button>
                    </form>
                    <form action="/features/{{$feature->id}}/delete" method="post">
                        @csrf
                        @method('patch')

                        <button type="submit">Delete</button>
                    </form>
                    @endif
                </li>
                @endforeach
                </ul>
        </div>
        @endforeach


<a href="/logout">Logout</a>
