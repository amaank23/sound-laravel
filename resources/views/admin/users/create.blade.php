@extends('admin/layout/master')


@section('content')
<div class="audio-index">
    <div class="section-title-container">
        <h2>Add User</h2>
        <div class="liner"></div>
    </div>
    <div class="form-to-enter">
        <form action="{{ route('admin.users.add') }}" method="POST">
            @csrf
            <input type="text" name="name" id="" class="form-control" placeholder="Full Name">
            @error('name')
            <small>{{ $message }}</small>
            @enderror
            <input type="text" name="email" id="" class="form-control" placeholder="Email">
            @error('email')
            <small>{{ $message }}</small>
            @enderror
            @error('userAlreadyExist')
            <small>{{ $message }}</small>
            @enderror
            <input type="password" name="password" id="" class="form-control" placeholder="Password">
            @error('password')
            <small>{{ $message }}</small>
            @enderror
            <input type="password" name="confirmpassword" id="" class="form-control" placeholder="Confirm Password">
            @error('confirmpassword')
            <small>{{ $message }}</small>
            @enderror
            @error('passwordNotMatch')
            <small>{{ $message }}</small>
            @enderror
            <input type="text" name="phone" id="" class="form-control" placeholder="Phone Number">
            @error('phone')
            <small>{{ $message }}</small>
            @enderror
            <button type="submit" class="form-control">Register</button>
        </form>
    </div>
</div>
@endsection