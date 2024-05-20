@extends('app')

@section('content')
    <h1>Edit Album</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('albums.update', $album) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Album Name:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $album->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
