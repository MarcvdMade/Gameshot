<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use Likable;

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

}
