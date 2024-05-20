@extends('app')

@section('content')
    <h1>Albums</h1>

    @foreach($albums as $album)
        <div>
            <h2>{{ $album->name }}</h2>
            <p>{{ $album->pictures->count() }} pictures</p>
            <a href="{{ route('albums.show', $album) }}">View</a>
            <a href="{{ route('albums.edit', $album) }}">Edit</a>
            <form action="{{ route('albums.destroy', $album) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    @endforeach

    <a href="{{ route('albums.create') }}">Create New Album</a>
@endsection
