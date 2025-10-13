@extends('layout')
@section('title', '投稿一覧')

@section('content')
<section id="report_list">
	<h4>全部で{{ $articles->total() }}件の記事があります。</h4>
	<p>
		<a href="{{ route('report.report_list') }}?order=desc">新着降順</a>｜<a href="{{ route('report.report_list') }}?order=asc">新着昇順</a>
	</p>
	@include('post_table')
	{{-- <p>
	@if( $offset >= 1 ) <a href="{{ route('report.report_list') }}?order={{ $order }}">最初の10件</a>｜  @endif
	@if( $offset >= 10 ) <a href="{{ route('report.report_list') }}?offset={{ $offset - 10 }}&order={{ $order }}">前の10件</a>｜ @endif
	@if( $offset + 10 < $count ) <a href="{{ route('report.report_list') }}?offset={{ $offset + 10 }}&order={{ $order }}">次の10件</a> @endif
	@if( $offset + 10 < $count )｜<a href="{{ route('report.report_list') }}?offset={{ $count - 10 }}&order={{ $order }}">最後の10件</a> @endif
	</p> --}}
	<p>
		{{ $articles->onEachSide(3)->links() }}
	</p>
	<p>
		<a href="{{ route('report.index') }}">インデックスへ戻る</a>
	</p>
</section>
@endsection