@extends('layout')
@section('title', '記事詳細')

@section('content')
<section id="detail">
	<article class="detail">
		<h3>{{ $articles->title }}</h3>
	@isset( $articles->img )
		<div id="img_box" style="text-align: center;, max-height: 1000px;">
			<image src="{{ asset( 'storage/'. $articles->img) }}" class="img-fluid" style="max-width: 75%;, height: auto;">
		</div>
	@endisset<?= "\n" ?>
		<p>
			{!! nl2br(e($articles->article)) !!}
		</p>
		<p style="text-align: right;">
			投稿者：{{ $articles->poster }}<br>
			投稿日時：{{ $create_date }}
		</p>
	</article>
	<p>
		<a href="{{ route('report.index') }}">インデックスへ戻る</a>
	</p>
		<form action="{{ route( 'comment.post' ) }}" enctype="multipart/form-data" method="POST">
		<input type="hidden" name="report_id" value="{{ $articles->id }}">
		@csrf<?= "\n" ?>
		<label>投稿者名</label>
		<input type="text" name="poster" class="form-control">
		<label>コメント</label>
		<input type="text" name="comment" placeholder="コメントを入力" class="form-control"></textarea>
		<button type="submit" class="btn btn-primary">投稿する</button>
	</form>
	@if( $articles->comments_count != 0 )
	<h4>{{$articles->comments_count}}件のコメント</h4>
	<table class="table table-striped table-hover">
		<tr>
			<th width="15%">投稿者</th>
			<th>コメント</th>
		</tr>
	@foreach( $articles->comments as $comment )
		<tr>
			<td>{{ $comment->poster }}</td>
			<td>{!! nl2br(e($comment->comment)) !!}</td>
		</tr>
	@endforeach
	</table>
	@else
		<h4>コメントはまだありません。</h4>
	@endif
</section>
@endsection