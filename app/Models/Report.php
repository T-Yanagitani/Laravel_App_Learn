<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
	use SoftDeletes;
    //
	protected $fillable = [
		'poster',
		'title',
		'article',
		'img',
		'tags',
		'importance'
	];

	public function comments() {
		return $this->hasMany( Comment::class );
	}

	protected $dates = ['deleted_at'];
}
