<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShareLinkPost extends Model
{
    protected $fillable = [
        'user_send', 'link_post', 'user_get', 'post_id'
    ];

    public function post()
    {
        return $this->hasMany(Post::class, 'post_id', 'id');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'user_get', 'id');
    }
}
