@extends('admin.layouts.main')

@section('content')
<div class="container">

<div class="table-responsive">
    <a href="{{ route('admin.users.create') }}" class="btn btn-dark m-3 text-center">Add a User</a>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">email</th>
                <th scope="col">Permissions</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @foreach ($user->getDirectPermissions(); as $permission)
                        <span class="badge text-sm bg-info text-dark">{{ $permission->name }}</span>
                    @endforeach
                </td>
                <td><a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
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
@endsection