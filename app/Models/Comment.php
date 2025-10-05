<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
	protected $fillable = [
		'poster',
		'comment',
		'report_id'
	];

	public function report() {
		return $this->belongsTo( Report::class );
	}
}
