<p>Hello, {{ $user->name }}!</p>

<a href="/logout">Logout</a>

<form method="POST" action="/features" >
@csrf
    <label for="description">Description</label>
    <input type="text" name="description" id="description">
    <button type="submit">Add feature</button>
</form>
@include('errors')