<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
	protected $fillable = [
		'poster',
		'title',
		'article',
		'img'
	];

	public function comments() {
		return $this->hasMany( Comment::class );
	}
}
