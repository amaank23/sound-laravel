@extends('admin/layout/master')


@section('content')
<div class="audio-index">
    <div class="section-title-container">
        <h2>Manage Users</h2>
        <div class="liner"></div>
    </div>
    <div class="add-new-btn"><a href="{{ route('admin.users.create') }}">Add new User</a></div>
    <table class="table table-bordered" style="color: #fff;">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <th>{{ $user['id'] }}</th>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['email'] }}</td>
                <td>{{ $user['phone_number'] }}</td>
                <td><a href="{{ route('admin.users.destroy', ['id' => $user['id']]) }}"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection