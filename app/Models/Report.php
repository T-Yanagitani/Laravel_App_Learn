<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
	use SoftDeletes, HasFactory;
    //
	protected $fillable = [
		'poster',
		'title',
		'article',
		'img',
		'tags',
		'importance'
	];

	protected $dates = ['deleted_at'];

	public function comments() {
		return $this->hasMany( Comment::class );
	}

	public function users() {
		return $this->belongsTo( User::class );
	}

}
