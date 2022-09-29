@include('home.header')
    <h2 class="text-center mt-4">Blog Form</h2>
    <div class="mt-4">
        
        
                <form action="{{ url('/blog') }}" method="post">
                @csrf
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <input type="text" name="title" placeholder="Title" class="form-control" required/>
                        </div>
                        <div class="col-md-3 mt-3">
                            <select class="form-control" name="category_id" required>
                                <option selected disabled>Select Category</option>
                                @foreach($blogcategories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="row col-md-9 mt-3">
                        <textarea placeholder="Body" name="body" class="form-control" style="height: 300px;" required></textarea>
                    </div>
                    <div class="row col-md-2 mt-3">
                        <input type="submit" value="Submit" class="btn btn-primary"/>
                    </div>
                </form>
            
        
    </div>
@include('home.footer')