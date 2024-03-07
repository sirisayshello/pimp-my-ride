@include('includes.header')
<h2>{{ $user->name }}'s cars</h2>

@include('errors')
<form method="POST" action="/cars" >
    @csrf
        <div>
            <label for="car_description">Car name</label>
            <input type="text" name="car_description" id="car_description">
        </div>
        <button type="submit"><i class="fa-solid fa-plus"></i> Add car</button>
</form>


@foreach($user->cars as $car)
<div class="car">
    <h3><i class="fa-solid fa-car"></i> {{ $car->car_description }}</h3>
    <form action="/cars/{{$car->id}}/delete" method="post">
        @csrf
        @method('delete')
        <button type="submit"><i class="fa-solid fa-minus"></i> Delete car</button>
    </form>
    <form method="POST" action="/features" >
        @csrf
        <input type="hidden" id="car_id" name="car_id" value="{{ $car->id }}">
        <div>
            <label for="description">Feature description</label>
            <input type="text" name="description" id="description">
        </div>
        <button type="submit"><i class="fa-solid fa-plus"></i> Add feature</button>
    </form>
    <ul>
        @foreach($car->features as $feature)
        <li>
        @if($feature->completed)
            <div class="feature">
                <s>{{ $feature->description }}</s>
            </div>
            @else
            <div class="feature">
                {{ $feature->description }}
                <form action="/features/{{$feature->id}}/complete" method="post">
                    @csrf
                    @method('patch')
                    <button type="submit"><i class="fa-solid fa-check"></i> Complete</button>
                </form>
                <form action="/features/{{$feature->id}}/delete" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit"><i class="fa-solid fa-minus"></i> Delete</button>
                </form>
            </div>
            @endif
        </li>
        @endforeach
        </ul>
</div>
@endforeach


<a href="/logout">Log out <i class="fa-solid fa-right-from-bracket"></i></a>
@include('includes.footer')