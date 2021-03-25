<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'nickname', 'profileurl', 'avatar', 'steamid', 'password'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = 'tbl_steam_user';
    

    static public function updateProfile(array $data, $id){
        $d = User::find($id);
        $d->trade_link = $data['trade_link'];
        $d->save();
    }

    public function wallet(){
        return $this->belongsTo(wallet::class, 'id', 'user_id');
    }

    public function inventory()
    {
        return $this->hasMany(inventory::class,'user_id', 'id');
    }
    /*public static function newRegister(array $data){
        $d = new User;
        $d->first_name      = $data['first_name'];
        $d->surname         = $data['surname'];
        $d->gender          = $data['gender'];
        $d->dob             = $data['dob'];
        $d->username        = $data['username'];
        $d->email           = $data['email'];
        $d->phone           = $data['phone'];
        $d->password        = bcrypt($data['password']);
        $d->status          = '1';
        $d->verification    = '0';

        $d->save();
    }

    public static function updateUser(array $data,$ext){
        $d = User::find(Auth::user()->id);
        $d->first_name      = $data['firstname'];
        $d->surname         = $data['surname'];
        $d->gender          = $data['gender'];
        $d->dob             = $data['dob'];
        $d->phone           = $data['phone'];
        $d->bio             = $data['profile-bio'];
        $d->profile_img     = $ext;

        $d->save();
    } 

    public static function updateSocial(array $data){
        $d = User::find(Auth::user()->id);
        $d->twitter_link      = $data['profile-twitter'];
        $d->facebook_link      = $data['profile-facebook'];
        $d->instagram_link      = $data['profile-instagram'];

        $d->save();
    } 

    public static function updatePassword(array $data){
        $d = User::find(Auth::user()->id);
        $d->password      = bcrypt($data['password']);

        $d->save();
    }

    public function messages(){
        return $this->hasMany(Chat::class);
    }*/
}
