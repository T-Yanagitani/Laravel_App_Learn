@extends('layout')
@section('title', '記事詳細')

@section('content')
<section id="detail">
	<h2>投稿詳細</h2>
	<article class="detail">
	@isset( $articles->img )
		<div id="img_box">
			<image src="{{ asset( 'storage/'. $articles->img) }}" class="img-fluid">
		</div>
	@endisset<?= "\n" ?>
		<h3 id="title">{{ $articles->title }}</h3>
		<p class="a_right"><a href="{{ route('report.edit', ['id' => $id]) }}" class="btn btn-primary">投稿を編集する</a></p>
		<p id="article">
			{!! nl2br(e($articles->article)) !!}
		</p>
		<p id="post_data">
			投稿者：{{ $articles->poster }}<br>
			投稿日時：{{ $create_date }}
		</p>
	</article>
	<h4>記事にコメントする</h4>
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
	<table id="comment" class="table table-striped table-hover">
		<thead class="table-dark">
			<tr>
				<th width="15%">投稿者</th>
				<th width="50%">コメント</th>
				<th>投稿日時</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
	@foreach( $articles->comments as $comment )
			<tr>
				<td>{{ $comment->poster }}</td>
				<td>{!! nl2br(e($comment->comment)) !!}</td>
				<td>{{ $comment->created_at }}</td>
				<td>
					<form action="{{ route( 'comment.delete', ['article_id' => $id, 'comment_id' => $comment->id] ) }}" method="POST">
						@csrf<?= "\n" ?>
						@method('delete')<?= "\n" ?>
						<button type="submit" class="btn btn-danger">削除</button>
					</form>
				</td>
			</tr>
	@endforeach
		</tbody>
	</table>
	@else
		<h4>コメントはまだありません。</h4>
	@endif
	<p>
		<a href="{{ route('report.index') }}">インデックスへ戻る</a>｜<a href="{{ route('report.report_list') }}">一覧へ戻る</a>
	</p>
</section>
@endsection