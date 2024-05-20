@extends('app')

@section('content')
    <h1>Delete Album</h1>

    <p>The album contains pictures. What would you like to do with them?</p>

    <form action="{{ route('albums.destroyWithOptions', $album) }}" method="POST">
        @csrf
        <div class="form-group">
            <label>
                <input type="radio" name="action" value="delete"> Delete all pictures
            </label>
        </div>
        <div class="form-group">
            <label>
                <input type="radio" name="action" value="move"> Move pictures to another album
            </label>
            <select name="target_album_id" class="form-control">
                @foreach ($otherAlbums as $otherAlbum)
                    <option value="{{ $otherAlbum->id }}">{{ $otherAlbum->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-danger">Proceed</button>
    </form>
@endsection
