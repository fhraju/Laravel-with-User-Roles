@extends('admin.layouts.main')
@section('content')
<div class="container">
<div class="row">
    <div class="table-responsive">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary m-3 text-center">Add Category</a>
        <table class="table">
            <thead class="thead">
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Parent Category</th>
                    <th scope="col">Creation Date</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $key=>$categorie)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $categorie->name }}</td>
                <td>
                    @if($categorie->category_id)
                        {{ $categorie->parentCategory->name }}
                    @else
                        No Parent Category
                    @endif
                </td>
                <td>{{ $categorie->created_at }}</td>
                <td><a href="{{ route('admin.categories.edit', $categorie->id) }}" class="btn btn-primary">
                    <i class="fa fa-edit"></i>
                    Edit</a></td>
                <td>
                    <form action="{{ route('admin.categories.destroy', $categorie->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        
                        <input type="submit" class="btn btn-danger" onclick="return confirm('Are you Sure')" value="Delete">
                    </form>
                </td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection