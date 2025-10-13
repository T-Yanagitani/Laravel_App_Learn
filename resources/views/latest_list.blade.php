<section class="latest_list">
	<h4>最新の投稿5件</h4>
@include('post_table')
	<p style="text-align: right;">
		全部で{{ $articles->total() }}件の投稿があります。<br>
		<a href="{{ route('report.report_list') }}">投稿リストをもっと見る</a>
	</p>
</section>