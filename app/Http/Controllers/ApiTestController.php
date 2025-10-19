<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiTestController extends Controller
{
    //
	public function index() {
		return response()->json([
			'message' => 'Hello World from Laravel!',
			'status' => 'success',
		]);
	}
}
