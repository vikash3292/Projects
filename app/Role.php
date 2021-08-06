<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

	 protected $table = 'main_roles';

	  protected $fillable = ['rolename', 'roletype','roledescription'];
    

     public function permission(){
        //return $this->belongsToMany('App\Permission');
         return $this->belongsToMany(Permission::class,'role_permissions');
    }
}
