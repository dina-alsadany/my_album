@extends('app')

@section('content')
    <h1>Create New Album</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('albums.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Album Name:</label>
            <input type="text" id="name" name="name" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
