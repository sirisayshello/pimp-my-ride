@include('includes.header')
<hr style="border: 6px solid #FFE015; width: 100%;">
<div class="info">
    <h3>Register your whip, drop your wishlist, and let's crank up the ride game.</h3>
</div>
<section class="intro">

    @include('errors')
    @if(count($user->cars) > 0)
    <h2>{{ $user->name }}'s cars</h2>
    @else
    <h2>Hit us with a ride to get started!</h2>
    @endif
    <form method="POST" action="/cars" >
        @csrf
            <div>
                <h3>Throw that ride in the mix</h3>
                <label for="car_description"></label>
                <input type="text" name="car_description" id="car_description" placeholder="Cruise Handle">
            </div>
            <button type="submit"><i class="fa-solid fa-plus"></i> Add ride</button>
    </form>
</section>

<section class="cars">

@foreach($user->cars as $car)
    <div class="car">
        <h3><i class="fa-solid fa-car"></i> {{ $car->car_description }}</h3>
        <form action="/cars/{{$car->id}}/delete" method="post">
            @csrf
            @method('delete')
            <button type="submit"><i class="fa-solid fa-minus"></i> Delete ride</button>
        </form>
        <form method="POST" action="/features" >
            @csrf
            <input type="hidden" id="car_id" name="car_id" value="{{ $car->id }}">
            <div>
                <label for="description"></label>
                <input type="text" name="description" id="description" placeholder="Pimp Specs">
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
</section>

<a href="/logout">Log out <i class="fa-solid fa-right-from-bracket"></i></a>
@include('includes.footer')
