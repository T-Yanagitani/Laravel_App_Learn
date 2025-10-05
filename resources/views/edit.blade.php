@extends('layout')
@section('title', '投稿編集フォーム')

@section('content')
<section id="edit">
	@isset( $articles->img )
		<div id="img_box">
			<image src="{{ asset( 'storage/'. $articles->img) }}" class="img-fluid">
		</div>
	@endisset<?= "\n" ?>
		<p>
			{!! nl2br(e($articles->article)) !!}
		</p>
	</article>
	<h3>上の投稿を編集する</h3>
	<p>画像の編集は出来ません。</p>
	<form action="{{ route( 'report.update' ) }}" enctype="multipart/form-data" method="POST">
		@csrf<?= "\n" ?>
		<label class="form-label">投稿者名</label>
		<input type="text" name="poster" class="form-control-plaintext col" value="{{ $articles->poster }}" readonly>
		<label class="form-label">記事タイトル</label>
		<input type="text" name="title" class="form-control-plaintext" maxlength="50" value="{{ $articles->title }}" readonly>
		<label class="form-label">コメント</label>
		<textarea name="article" rows="5" placeholder="コメントを入力" class="form-control" maxlength="1000" require>{{ $articles->article }}</textarea>
		<button type="submit" class="btn btn-primary">編集を確定する</button>
	</form>
	<p>
		<a href="{{ route('report.detail', ['id' => $id]) }}" class="btn btn-primary">編集をキャンセルする</a>
	</p>
</section>
@endsection