<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use QCod\ImageUp\HasImageUploads;

class User extends Authenticatable
{
    use HasImageUploads;
    use HasFactory, Notifiable;

    // assuming `users` table has 'cover', 'avatar' columns
    // mark all the columns as image fields
    protected static $imageFields = [
        'img' => [
            'path' => 'upload/avatars',
            'width' => 150,
            'height' => 150
        ],
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'role_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Adding foreign Tables
    public function courses()
    {
        return $this->hasMany(Course::class,"author_id","id");
    }

    public static function updateProfile($data)
    {
        $user = User::find(Auth::user()->id);
        $user->uploadImage($data->file('avatar', 'avatar'));
        $user->name = $data->get('name');
        $user->password = bcrypt($data->get('password'));
        $user->save();
    }


}
