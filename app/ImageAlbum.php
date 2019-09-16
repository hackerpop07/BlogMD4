<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageAlbum extends Model
{
    protected $fillable = [
        'path', 'user_id', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
