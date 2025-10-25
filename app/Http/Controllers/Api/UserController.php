<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
	public function register( Request $request ) {
		$data = $request->json()->all();

		// 仮処理
		return response()->json([
			'message' => 'ユーザー登録データを受信しました',
			'user' => $data,
		]);
	}

	public function profile( $id ) {
		return response()->json([
			'message' => 'ユーザープロフィール情報',
			'user' => [
				'id' => $id,
				'name' => 'User',
				'level' => 5
			]
		]);
	}
}
