<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ForumComment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['chatter_post_id', 'user_id', 'comment'];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->hasOne(ForumPost::class, 'id', 'chatter_post_id');
    }

    public static function add($request)
    {
        $comment = new self();
        $comment->chatter_post_id = $request->get('post');
        $comment->user_id = Auth::id();
        $comment->comment = $request->get('description');
        return $comment->save();
    }
}
