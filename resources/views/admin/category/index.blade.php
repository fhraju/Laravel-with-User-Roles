@extends('admin.layouts.main')
@section('content')
<div class="mx-4">
    <h2> All Category </h2>

    @foreach ($categories as $category)
        <p><a href="/admin/categories/category">{{$category->name}}</a></p><br>
    @endforeach
    <div>
        <a href="{{ route('admin.categories.create') }}"> Create a Category</a>
    </div>
</div>
@endsection