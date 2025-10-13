<section class="latest_list">
	<h4>重要な投稿：最新の5件</h4>
	<table class="table table-striped table-hover">
		<thead class="table-dark center">
			<tr id="table_header">
				<th width="60%">タイトル</th>
				<th>画像</th>
				{{-- <th width="40%">投稿内容</th> --}}
				<th width="15%">投稿者</th>
				<th>返信数</th>
				<th>投稿日時</th>
			</tr>
		</thead>
		<tbody>
	@foreach( $importance as $article )
			<tr>
				<td class="text-truncate"><a href="{{route('report.detail', ['id' => $article->id])}}" title="{{ $article->article }}">{{ $article->title }}</a></td>
				<td align="center">
				@if( $article->img != "" )
				〇
				@endif
				</td>
				{{-- <td id="list_preview">{{ $article->article }}</td> --}}
				<td class="center">{{ $article->poster }}</td>
				<td class="center">{{ $article->comments_count }}</td>
				<td class="center">{{ $article->created_at }}</td>
			</tr>
	@endforeach
		</tbody>
	</table>
	<p style="text-align: right;">
		以上が、重要な投稿です。
	</p>
</section>