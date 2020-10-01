<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function game() {
        return $this->belongsTo(Games::class);
    }

    public function genre() {
        return $this->belongsTo(Genre::class);
    }
}
