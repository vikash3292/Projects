<?php
namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Main_users extends Model implements AuthenticatableContract, CanResetPasswordContract
{use Authenticatable, CanResetPassword;

    //
    protected $table = 'main_users';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'firstname', 'emailaddress', 'password',
    ];
}