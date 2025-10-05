@extends('layout')
@section('title', '投稿フォーム')

@section('content')
<section id="write">
	<h2>投稿フォーム</h2>
	<form action="{{ route( 'report.post' ) }}" enctype="multipart/form-data" method="POST">
		@csrf<?= "\n" ?>
		<label>投稿者名</label>
		<input type="text" name="poster" class="form-control" require>
		<label>記事タイトル</label>
		<input type="text" name="title" class="form-control" maxlength="50" require>
		<label>コメント</label>
		<textarea name="article" rows="5" placeholder="コメントを入力" class="form-control" maxlength="1000" require></textarea>
		<label>画像添付（対応形式：jpg/jpeg/png/gif/bmp　最大2MB　縦横サイズ1980pxまで）</label>
		<input type="file" name="image" class="form-control" accept=".jpg, .jpeg, .png, .gif, .bmp"></textarea>
		<button type="submit" class="btn btn-primary">投稿する</button>
	</form>
	<p>
		<a href="{{ route('report.index') }}">インデックスへ戻る</a>
	</p>
</section>
@endsection