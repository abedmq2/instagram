<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Admin extends Authenticatable
{
    //

    use Notifiable  ;

    protected $fillable=['name','first_name','last_email','phone','email','password'];

    protected $appends=['role','automatic_add'];

    function getRoleAttribute(){
        return $this->roles->first()??new Role();
    }

    function getAutomaticAddAttribute(){
        return $this->can('automatic add');
    }
    function image()
    {
        return  "images/character/" . Str::upper($this->first_name[0]);
    }




    function addResetPassword()
    {
        if ($this->password_reset) {
            return $this->password_reset->token;
        } else {
            $password_reset = new PasswordReset();
            $password_reset->email = $this->email;
            $password_reset->token = md5(Str::random(16));
            $password_reset->save();
            return $password_reset->token;
        }
    }



    function scopeSearch($q, $search)
    {
        if($search)
            $q->where('name','like','%'.$search.'%')->orWhere('email','like','%'.$search.'%');
    }

}
