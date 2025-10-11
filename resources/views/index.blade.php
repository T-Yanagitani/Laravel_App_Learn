@extends('layout')
@section('title', 'マイルーム')

@section('content')
<section id="index">
	<h2>ようこそ、_user_name_さん。</h2>
	<section>
		今日は、{{ $today }}です。
	</section>
	<section id="task_list">
		本日のタスクはありません。
	</section>
	<section id="import_post">
	@include('importance_list')<?= "\n" ?>
	</section>
	<hr>
	<form action="{{ route('report.search') }}" method="GET" class="f_right">
		<label>投稿検索（本文検索）</label>
		<input type="text" name="keyword" required>
		<label><input type="radio" name="mode" value="1" checked>AND検索</label>
		<label><input type="radio" name="mode" value="2">OR検索</label>
		<button type="submit">検索</button>
	</form>
	@include('latest_list')<?= "\n" ?>
	<p>
		<a href="{{ route('report.write') }}" class="btn btn-primary">記事を投稿する</a>
	</p>
</section>
@endsection