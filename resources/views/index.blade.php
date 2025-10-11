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
	@include('latest_list')<?= "\n" ?>
	<p>
		<a href="{{ route('report.write') }}" class="btn btn-primary">記事を投稿する</a>
	</p>
</section>
@endsection