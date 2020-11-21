<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $fillable = ["title"];

    public static function createData($request){
        $category = new self();
        $category->fill($request);
        return $category->save();
    }

    public static function updateData($category,$request){
        $category->update($request);
        return $category->save();
    }

}
