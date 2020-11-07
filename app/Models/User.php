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
        "phone",
        "img",
        "description",
        "status",
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

    //Adding foreign Tables and Relations
    //#1 Видеокурсы, Материалы, Опросы, Тесты
    public function role(){
        return $this->belongsTo(Role::class,"role_id","id");
    }
    //1.Курсы (автор)
    public function courses()
    {
        return $this->hasMany(Course::class,"author_id","id");
    }
    //2. Материалы (автор)
    public function materials()
    {
        return $this->hasMany(Materials::class,"author_id","id");
    }
    //3. Опрос (автор)
    public function reviews(){
        return $this->hasMany(Review::class,"author_id","id");
    }
    //4. Тест (автор)
    public function quiz(){
        return $this->hasMany(Quiz::class, "author_id","id");
    }
    //5. Экзамены (автор)
    public function examinations(){
        return $this->hasMany(Examination::class,"author_id","id");
    }
    //6. Подписка (студент)
    public function subscribers(){
        return $this->hasMany(Subscriber::class,"user_id","id");
    }
    //7. Подписка (автор)
    public function author_subscribers(){
        return $this->hasMany(Subscriber::class,"author_id","id");
    }
    //8.Пользователь - Видео (студент)
    public function uservideo(){
        return $this->hasMany(UserVideo::class,"student_id","id");
    }
    //9. Результат (автор)
    public function results(){
        return $this->hasMany(Result::class,"author_id","id");
    }
    //10.Результат (студент)
    public function results_student(){
        return $this->hasMany(Result::class,"student_id","id");
    }

    //#1 Через многие видео, вопросы к тестам, вопросы к опросам
    //Курс -> Видео
    public function videos(){
        return $this->hasManyThrough(Video::class,Course::class,"author_id","course_id","id");
    }
    //Тест -> Вопрос
    public function questions(){
        return $this->hasManyThrough(Question::class,Quiz::class,"author_id","quiz_id","id");
    }
    //Опрос -> Вопрос
    public function review_questions(){
        return $this->hasManyThrough(ReviewQuestion::class,Review::class,"author_id","review_id","id");
    }



    public static function saveUser($request){
        $data = $request->all();
        $data["img"] = FileDownloader::saveFile("/upload/avatars/",$request,"img");
        $data["password"] = bcrypt($data["password"]);
        $data["status"] = $request->has("status") ? 1 : 0;
        $user = new self();
        $user->fill($data);
        return $user->save();
    }
    public static function updateUser($request,$id){
        $user = User::find($id);
        if($user){
            $data = $request->except("password");
            $password = $request->get("password");
            if(strlen(trim($password))){$data["password"] = bcrypt($password);}
            $data["img"] = FileDownloader::saveFile("/upload/avatars/",$request,"img",$user->img);
            $data["status"] = $request->has("status") ? 1 : 0;

            $user->update($data);
            return $user->save();

        }
        else{
            return false;
        }



    }





    public static function updateProfile($data)
    {
        $user = User::find(Auth::user()->id);
        if ($data->hasFile('avatar')) {
            $user->uploadImage($data->file('avatar', 'avatar'));
        }
        $user->name = $data->get('name');
        $user->password = bcrypt($data->get('password'));
        $user->save();
    }


}
