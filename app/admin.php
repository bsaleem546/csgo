<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password','status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = 'tbl_usr';

    public static function newRegister(array $data){
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
    }
}
