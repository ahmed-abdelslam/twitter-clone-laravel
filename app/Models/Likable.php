<?php

namespace App\Models;

trait Likable {

    public function scopeWithLikes($query)
    {
        return $query->leftJoinSub(
            'select tweet_id, sum(liked) likes, sum(!liked) dislikes from likes group by tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );
    }

    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->user()->id()
        ], [
            'liked' => $liked
        ]);
    }

    public function disLike($user = null)
    {
        return $this->like($user, false);
    }

    public function isLikedBy(User $user)
    {
        return (bool) Like::where('tweet_id', $this->id)->where('liked', true)->where('user_id', $user->id)->get()->count();
    }

    public function isDisLikedBy(User $user)
    {
        return (bool) Like::where('tweet_id', $this->id)->where('liked', false)->where('user_id', $user->id)->get()->count();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
