<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class ForgetPassword extends Model
{
    use HasFactory;
    protected $table="forget_password";
    protected $fillable = ["user_id","email","token","expiration_date"];
    protected $casts = ["expiration_date"=>'date'];
    public $timestamps = false;


    public function user(){
        return $this->belongsTo(User::class,"user_id","id");
    }

    public static function saveData($request){
        $forget = ForgetPassword::where("email",$request->get("email"))->first();
        if($forget){$forget->delete();}
        $user = User::where("email",$request->get("email"))->first();
        if($user){
            $model = new self();
            $data = $request->all();
            $data["user_id"] = $user->id;
            $data["email"] = $user->email;
            $data["token"] = Str::random(10);
            $data["expiration_date"] = Carbon::now()->addHours(1);
            $model->fill($data);
            $model->save();
        }


    }




}
