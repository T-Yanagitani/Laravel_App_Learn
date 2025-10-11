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
@foreach( $articles as $comment )
		<tr>
			<td class="text-truncate"><a href="{{route('report.detail', ['id' => $comment->id])}}">{{ $comment->title }}</a></td>
			<td align="center">
			@if( $comment->img != "" )
			〇
			@endif
			</td>
			<td id="list_preview">{{ $comment->article }}</td>
			<td class="center">{{ $comment->poster }}</td>
			<td class="center">{{ $comment->comments_count }}</td>
			<td class="center">{{ $comment->created_at }}</td>
		</tr>
@endforeach
	</tbody>
</table>