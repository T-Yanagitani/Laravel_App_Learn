@extends('layout')
@section('title', '検索結果')

@section('content')
<section class="result_list">
	<h3>検索結果</h3>
	<h4>
		検索キーワード（{{ $mode }}検索）：
	@foreach( $keywords as $keyword )
		{{ $keyword }}
	@endforeach
	</h4>
	@include('post_table')
	<p style="text-align: right;">
		<a href="{{ route('report.index') }}">インデックスに戻る</a>
	</p>
</section>
@endsection