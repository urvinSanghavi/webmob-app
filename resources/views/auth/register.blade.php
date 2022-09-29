@include('home.header')
@if(Session::get('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif


<h2 class="mt-4">Register</h2>
<form action="{{ url('/adduser') }}" method="post" autocomplete="off">
    @csrf
    <div class="row mt-4">
        <div class="col-md-3">
            <input type="text" name="name" placeholder="Name" class="form-control" required/>
        </div>
        <div class="col-md-3">
            <input type="email" name="email" placeholder="Email" class="form-control" required/>
        </div>
        <div class="col-md-3">
            <input type="password" name="password" placeholder="Password" class="form-control" required/>
        </div>
        <div class="col-md-3">
            <input type="submit" value="Register" class="btn btn-primary"/>
        </div>
    </div>
</form>
<div class="row mt-4">
    <div class="col-md-3">
        <a href="{{ url('/') }}">Click Here For Login</a>
    </div>
</div>

@include('home.footer')