@extends('layout')
@section('title', 'インデックス')

@section('content')
<section id="index">
	<h2>This is INDEX Page.</h2>
	<p>
		Hello World.
	</p>
	<section class="list">
		<h3>全部で{{ $count }}件あります。</h3>
		<p>新着降順｜新着昇順</p>
		<table class="table table-striped table-hover">
			<tr id="table_header">
				<th width="20%">タイトル</th>
				<th></th>
				<th>投稿内容</th>
				<th width="15%">投稿者</th>
				<th>返信数</th>
			</tr>
		@foreach( $articles as $comment )
			<tr>
				<td class="text-truncate"><a href="{{route('report.detail', ['id' => $comment->id])}}">{{ $comment->title }}</a></td>
				<td align="center">
				@if( $comment->img != "" )
				〇
				@endif
				</td>
				<td>{{ $comment->article }}</td>
				<td>{{ $comment->poster }}</td>
				<td>{{ $comment->comments_count }}</td>
			</tr>
		@endforeach
		</table>
	</section>
	<p>
		<a href="{{ route('report.write') }}" class="btn btn-primary">記事を投稿する</a>
	</p>
</section>
@endsection