<h1>Pimp my ride</h1>
<p>Hello, {{ $user->name }}!</p>

<h2>Your wanted features</h2>




<form method="POST" action="/features" >
@csrf
    <label for="description">Description</label>
    <input type="text" name="description" id="description">
    <button type="submit">Add feature</button>
</form>
@include('errors')

<ul>
@foreach($user->features as $feature)
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
    @endif
</li>
@endforeach
</ul>


<a href="/logout">Logout</a>
