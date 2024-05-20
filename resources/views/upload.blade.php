@extends('app')

@section('content')
    <h1>Upload Pictures to "{{ $album->name }}"</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('albums.storePictures', $album) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="pictures">Select Pictures:</label>
            <input type="file" id="pictures" name="pictures[]" class="form-control" multiple>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
@endsection
