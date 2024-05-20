<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Album extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['name'];

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }
}

// app/Models/Picture.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'album_id'];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
