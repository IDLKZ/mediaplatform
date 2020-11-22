<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ForumDiscussion extends Model
{
    protected $table = 'chatter_discussion';
    public $timestamps = true;
    protected $fillable = ['title', 'chatter_category_id', 'user_id', 'slug', 'color'];
    use Sluggable;
    use HasFactory;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function category()
    {
        return $this->hasOne(ForumCategory::class, 'id', 'chatter_category_id');
    }

    public function post()
    {
        return $this->hasOne(ForumPost::class, 'chatter_discussion_id', 'id');
    }

    public static function createDiscussion($data)
    {
        $topic = new self();
        $topic->chatter_category_id = $data->get('category');
        $topic->title = $data->get('title');
        $topic->user_id = Auth::id();
        $topic->color = 'green';
        $topic->save();
        return $topic;
    }
}
