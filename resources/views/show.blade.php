@extends('app')

@section('content')
    <h1>{{ $album->name }}</h1>

    <p>{{ $album->getMedia()->count() }} pictures</p>

    <!-- Display pictures -->
    @foreach ($album->getMedia() as $media)
        <img src="{{ $media->getUrl() }}" alt="{{ $media->name }}" style="max-width: 200px; margin: 10px;">
    @endforeach

    <a href="{{ route('albums.edit', $album) }}" class="btn btn-primary">Edit Album</a>

    <form action="{{ route('albums.destroy', $album) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete Album</button>
    </form>
@endsection
