<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

	 protected $table = 'permissions';
      protected $fillable = ['name', 'slug','status'];


      public function role(){
        //return $this->belongsToMany('App\Role');
        return $this->belongsToMany(Role::class,'role_permissions');
    }
}
