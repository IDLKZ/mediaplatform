<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumCategory extends Model
{
    protected $table = 'chatter_categories';
    protected $fillable = ['name', 'color'];
    use Sluggable;
    use HasFactory;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function discussion()
    {
        return $this->hasMany(ForumDiscussion::class, 'chatter_category_id', 'id');
    }
}
