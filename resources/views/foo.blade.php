@extends('layout')
@section('title', 'foo')

@section('content')
<section>
	<h1>Laravel_App_Learn</h1>
	<h2>This is foo Page.</h2>
	<p>
		{{ $comment }}
	</p>
	<a href={{ route('report.index') }}>インデックスへ戻る</a>
</section>
@endsection