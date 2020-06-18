<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
	//protected $fillable = ['name', 'lastname', 'email', 'phone', 'message', 'pincode', 'active'];
	
	protected $guarded = [];
	
	public function getActiveAttribute($attribute)
	{
		return 
		[
			1 => 'Active',
			0 => 'Inactive',
		][$attribute];
		
	} 
	
    public function scopeActive($query)
	{
		return $query->where('active',1);
	}
	 public function scopeInactive($query)
	{
		return $query->where('active',0);
	}
	
	public function company()
	{
		return $this->belongsTo(Company::class);
	}
}
