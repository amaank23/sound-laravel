@extends('admin/layout/master')


@section('content')
<div class="audio-index">
    <h1>Add Audio</h1>
    <form action="">
        @csrf
        <input type="text" class="form-control" placeholder="Enter the Title">
        <textarea name="" id="" cols="30" rows="10" class="form-control" placeholder="Enter the Description"></textarea>
        <label for="audio-upl">
            <div class="audio-uploader">
                <i class="fas fa-music"></i>
                <h2>Upload the Audio</h2>
            </div>
        </label>
        <input type="file" name="" id="audio-upl" hidden>
        <div class="select-option">
            <select name="" id="" class="form-control">
                <option value="">Select Artist</option>
            </select>
            <select name="" id="" class="form-control">
                <option value="">Select Album</option>
            </select>
        </div>
        <div class="select-option">
            <select name="" id="" class="form-control">
                <option value="">Select Genre</option>
            </select>
            <select name="" id="" class="form-control">
                <option value="">Select Year Released</option>
            </select>
        </div>
        <button type="submit" class="form-control">Add Audio</button>



    </form>
</div>
@endsection