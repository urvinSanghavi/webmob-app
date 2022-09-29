@include('home.header')
@if(Session::get('error'))
    <div class="alert alert-danger mt-4">
        {{ Session::get('error') }}
    </div>
@endif
@if(Session::get('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
<h2 class="mt-4">Login</h2>
<form action="{{ url('/login') }}" method="post" autocomplete="off">
    @csrf
    <div class="row mt-4">
        <div class="col-md-3">
            <input type="email" name="email" placeholder="Email" class="form-control" />
        </div>
        <div class="col-md-3">
            <input type="password" name="password" placeholder="Password" class="form-control" />
        </div>
        <div class="col-md-3">
            <input type="submit" value="Login" class="btn btn-primary"/>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-3">
            <a href="{{ url('/register') }}">Click Here For Register</a>
        </div>
    </div>
</form>

@include('home.footer')