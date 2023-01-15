@extends('admin.layouts.main')

@section('content')

<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Edit Category</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('admin.categories.update', $category->id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                <label for="name">Category Name *</label>
                <input type="text" name="name" class="form-control" id="name" 
                value="{{$category->name}}" required placeholder="Enter Name">
                </div>

                <div class="form-group">
                    <label for="category">SubCategory Of</label>
                    <select class="form-control" name="category_id">
                        <option value="" 
                        @if ($category->category_id == null)
                        selected   
                        @endif
                        >No Subcategory</option>
                        @foreach ($categories as $categori)
                            <option value="{{$categori->id}}"
                                @if ($category->category_id != null && $category->category_id == $categori->id )
                                    selected
                                @endif
                                >{{$categori->name}}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" class="btn btn-primary" value="Edit">
            </div>
            <!-- /.card-body -->
        </form>
    </div>
</div>
    </div>
</div>
</div>
@endsection