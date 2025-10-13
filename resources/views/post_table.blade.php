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
@foreach( $articles as $article )
		<tr>
			<td class="text-truncate"><a href="{{route('report.detail', ['id' => $article->id])}}" title="{{ $article->article }}">{{ $article->title }}</a></td>
			<td class="a_center">
			@if( $article->img != "" )
			〇
			@endif
			</td>
			{{-- <td id="list_preview">{{ $article->article }}</td> --}}
			<td class="a_center">{{ $article->poster }}</td>
			<td class="a_center">{{ $article->comments_count }}</td>
			<td class="a_center">{{ $article->created_at }}</td>
		</tr>
@endforeach
	</tbody>
</table>