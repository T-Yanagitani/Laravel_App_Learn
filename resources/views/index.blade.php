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
	<h4>重要なポスト</h4>
	<table class="table table-striped table-hover">
		<thead class="table-dark center">
			<tr id="table_header">
				<th width="20%">タイトル</th>
				<th>画像</th>
				<th width="40%">投稿内容</th>
				<th width="15%">投稿者</th>
				<th>返信数</th>
				<th>投稿日時</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="text-truncate">タイトル</td>
				<td class="center">〇</td>
				<td>サンプルテキスト</td>
				<td class="center">サンプルユーザー</td>
				<td class="center">0</td>
				<td class="center">0000-00-00 00:00:00</td>
			</tr>
		</tbody>
	</table>
	</section>
	@include('latest_list')<?= "\n" ?>
	<p>
		<a href="{{ route('report.write') }}" class="btn btn-primary">記事を投稿する</a>
	</p>
</section>
@endsection