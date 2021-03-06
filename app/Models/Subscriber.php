<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'author_id', 'user_id', 'status'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
    public function videos(){
        return $this->hasMany(Video::class,"course_id","course_id");
    }

    public function uservideo(){
        return $this->hasMany(UserVideo::class,"subscribe_id","id");
    }

    public function results()
    {
        return $this->hasManyThrough(Result::class, Course::class, 'id', 'course_id', 'course_id');
    }


}
