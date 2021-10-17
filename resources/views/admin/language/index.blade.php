@extends('admin/layout/master')


@section('content')
<div class="audio-index" style="height: 100vh;">
    <div class="page-title-container">
        <h1>All Languages</h1>
    </div>
    <div class="row">
        <div class="col-md-6">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Languages</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($languages as $language)
                    <tr>
                        <th>{{ $language['id'] }}</th>
                        <td>{{ $language['language'] }}</td>
                        <td><a href="{{ route('admin.language.destroy', ['id' => $language['id']]) }}"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <form action="{{ route('admin.language.add') }}" method="post">
                @csrf
                <input type="text" name="language" id="" placeholder="Enter The Language" class="form-control">
                <button type="submit" class="form-control">Add Language</button>
            </form>
        </div>
    </div>
</div>
@endsection