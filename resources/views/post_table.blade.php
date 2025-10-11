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
@foreach( $articles as $comment )
		<tr>
			<td class="text-truncate"><a href="{{route('report.detail', ['id' => $comment->id])}}" title="{{ $comment->article }}">{{ $comment->title }}</a></td>
			<td class="a_center">
			@if( $comment->img != "" )
			〇
			@endif
			</td>
			{{-- <td id="list_preview">{{ $comment->article }}</td> --}}
			<td class="a_center">{{ $comment->poster }}</td>
			<td class="a_center">{{ $comment->comments_count }}</td>
			<td class="a_center">{{ $comment->created_at }}</td>
		</tr>
@endforeach
	</tbody>
</table>