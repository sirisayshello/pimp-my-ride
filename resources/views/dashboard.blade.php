<p>Hello, {{ $user->name }}!</p>

<a href="/logout">Logout</a>

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
    <s>{{ $feature->desciption }}</s>
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
