@include('includes.header')
@include('errors')
<form method="post" action="/login">
    @csrf
    <div>
        <label for="email">Email</label>
        <input name="email" id="email" type="email" autocomplete="email" />
    </div>
    <div>
        <label for="password">Password</label>
        <input name="password" id="password" type="password" autocomplete="off" />
    </div>
    <button type="submit">Log in <i class="fa-solid fa-right-to-bracket"></i></button>
</form>
@include('includes.footer')


