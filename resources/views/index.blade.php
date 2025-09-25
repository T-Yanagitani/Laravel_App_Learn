@extends('layout')
@section('title', 'インデックス')

@section('content')
<section id="index">
	<h1>Laravel_App_Learn</h1>
	<h2>This is INDEX Page.</h2>
	<p>
		Hello World.
	</p>
	<section class="list">
		<h3>全部で{{ $count }}件あります。</h3>
		<table class="table table-striped table-hover">
			<tr>
				<th width="15%">投稿者</th>
				<th width="20%">タイトル</th>
				<th></th>
				<th>コメント</th>
			</tr>
		@foreach( $articles as $comment )
			<tr>
				<td>{{ $comment->poster }}</td>
				<td>{{ $comment->title }}</td>
				<td align="center">
				@if( $comment->img != "" )
				〇
				@endif
				</td>
				<td class="text-truncate"><a href="{{route('report.detail', ['id' => $comment->id])}}">{{ $comment->article }}({{ $comment->comments_count }})</a></td>
			</tr>
		@endforeach
		</table>
	</section>
	<form action="{{ route( 'report.post' ) }}" enctype="multipart/form-data" method="POST">
		@csrf
		<label>投稿者名</label>
		<input type="text" name="poster" class="form-control">
		<label>記事タイトル</label>
		<input type="text" name="title" class="form-control">
		<label>コメント</label>
		<textarea name="article" rows="5" placeholder="コメントを入力" class="form-control"></textarea>
		<label>画像添付（最大：4MB）</label>
		<input type="file" name="image" class="form-control" accept="image/*"></textarea>
		<button type="submit" class="btn btn-primary">投稿する</button>
	</form>
</section>
@endsection