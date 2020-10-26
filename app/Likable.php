<?php


namespace App;


use Illuminate\Database\Eloquent\Builder;

trait Likable
{
    public function scopeWithLikes(Builder $query)
    {
//        dd($query);
        $query->leftJoinSub(
            'select post_id, sum(liked) likes, sum(!liked) dislikes from likes group by post_id',
            'likes',
            'likes.post_id',
            'posts.id'
        );
    }

    public function like($user = null)
    {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id(),
        ], [
            'liked' => true
        ]);
    }

    public function dislike($user = null)
    {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id(),
        ], [
            'liked' => false
        ]);
    }

    public function isLikedBy(User $user)
    {
//        dd($user->likes);
        return (bool) $user->likes
            ->where('post_id', $this->id)
            ->where('liked', true)
            ->count();
//        return 'test';
    }

    public function isDislikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('post_id', $this->id)
            ->where('liked', false)
            ->count();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
