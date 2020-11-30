<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumPost extends Model
{
    protected $table = 'chatter_post';
    public $timestamps = true;
    protected $fillable = ['chatter_discussion_id', 'user_id', 'body', 'markdown'];
    use HasFactory;

    public function discussion()
    {
        return $this->belongsTo(ForumDiscussion::class, 'id', 'chatter_discussion_id');
    }

    public function comments()
    {
        return $this->hasMany(ForumComment::class, 'chatter_post_id', 'id');
    }

    public static function add($topic, $body)
    {
        $post = new self();
        $post->chatter_discussion_id = $topic->id;
        $post->user_id = $topic->user_id;
        $post->body = $body;
        $post->markdown = 1;
        return $post->save();
    }
}
