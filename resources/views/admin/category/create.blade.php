@extends('admin.layouts.main')

@section('content')

<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Add Category</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('admin.categories.store') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                <label for="name">Category Name *</label>
                <input type="text" name="name" class="form-control" id="name" required placeholder="Enter Name">
                </div>

                <div class="form-group">
                    <label for="category">SubCategory Of</label>
                    <select class="form-control" name="category_id">
                        <option value="">No Subcategory</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
            <!-- /.card-body -->
        </form>
    </div>
</div>
    </div>
</div>
</div>
@endsection