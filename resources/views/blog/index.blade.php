@include('home.header')
@if(Session::get('success'))
    <div class="alert alert-success mt-4 text-center" id="myElem">
        {{ Session::get('success') }}
    </div>
@endif
<div class="mt-4">
    <div class="row">
            <div class="col">
                <a href="{{  url('/logout') }}" class="float-end">Log Out</a>
            </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <label>Date</label>
            <input type="date" class="form-control" id="fdate"/>
        </div> 
        <div class="col-md-2 mt-4">
            <button class="btn btn-info" id="fdatebutton">Reset</button>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-3 mt-4">
            <a href="{{ url('/blog/create') }}" class="btn btn-success float-end">Post New Blog</a>
        </div>
    </div>
        <div class="valdate">
        @foreach($blogData as $blog)
        <div class="mt-3">
            <div class="row">
                <div class="col">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $blog->title }}</h5>
                            <p class="card-text">{{ $blog->body }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        </div>
</div>
<script>
    $("#fdate").change(function(){
        dateValue = $('#fdate').val();
        console.log(dateValue);
        $.ajax({
            url: "/blogfilter", 
            type: 'POST',
            data: jQuery.param({ datev: dateValue,  _token: '{{csrf_token()}}' }) ,
            success: function(result){
                var htmldat = "";
                if(result.length != 0){
                    $.each(result, function(index, value) {
                        
                        htmldat += '<div class="mt-3"><div class="row"><div class="col"><div class="card" style="width: 100%;"><div class="card-body"><h5 class="card-title">'
                        htmldat += this.title+'</h5><p class="card-text">'+this.body+'</p></div></div></div></div></div>';
                        
                    });
                    
                   
                } else {
                    htmldat = '<div class="mt-5 alert alert-danger text-center">No Data Found.</div>';
                }
                console.log(htmldat);
                $('.valdate').html(htmldat);
            },
            error: function () {
                console.log("error");
            }
    });
    });

    $("#fdatebutton").click(function(){
        location.reload();
    });
    

</script>   
    
@include('home.footer')