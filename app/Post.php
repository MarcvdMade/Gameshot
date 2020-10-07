<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function game() {
        return $this->belongsTo(Game::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

//    public function genre() {
//        return $this->belongsTo(Genre::class);
//    }

//    public function getPostImage($value)
//    {
//        return Storage::get($value);
//    }
}
