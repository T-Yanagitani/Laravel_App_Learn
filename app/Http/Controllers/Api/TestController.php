<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
	public function index( Request $request ) {
		// Unityから送られたJSONデータを受け取る
		$data = $request->json()->all();

		// 確認用のレスポンスを返す
		return response()->json([
			'message' => 'コントローラー経由のレスポンスです',
			'received' => $data,
		]);
	}
}
