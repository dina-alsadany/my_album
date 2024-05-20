<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Picture;



class AlbumController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $album = Album::create([
            'name' => $request->name,
        ]);

        return redirect()->route('albums.upload', $album)->with('success', 'Album created successfully');
    }

    public function upload(Album $album)
    {
        return view('upload', compact('album'));
    }

    public function storePictures(Request $request, Album $album)
    {
        $request->validate([
            'pictures.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        foreach ($request->file('pictures') as $file) {
            $album->addMedia($file)->toMediaCollection();
        }

        return redirect()->route('albums.show', $album)->with('success', 'Pictures uploaded successfully');
    }

    public function show(Album $album)
    {
        return view('show', compact('album'));
    }

    public function edit(Album $album)
    {
        return view('edit', compact('album'));
    }

    public function update(Request $request, Album $album)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $album->update([
            'name' => $request->name,
        ]);

        return redirect()->route('albums.show', $album)->with('success', 'Album updated successfully');
    }

    public function destroy(Request $request, Album $album)
{
    if ($album->getMedia()->count() > 0) {
        $otherAlbums = Album::where('id', '!=', $album->id)->get();
        return view('delete_options', compact('album', 'otherAlbums'));
    }

    $album->delete();

    return redirect()->route('albums.index')->with('success', 'Album deleted successfully');
}

    public function destroyWithOptions(Request $request, Album $album)
    {
        $action = $request->input('action');
        $targetAlbumId = $request->input('target_album_id');

        if ($action == 'delete') {
            $album->clearMediaCollection();
        } elseif ($action == 'move' && $targetAlbumId) {
            $targetAlbum = Album::find($targetAlbumId);
            foreach ($album->getMedia() as $media) {
                $media->move($targetAlbum, $media->collection_name);
            }
        }

        $album->delete();

        return redirect()->route('albums.index')->with('success', 'Album deleted successfully');
    }

}
