<?php
	$y = date( 'Y' );					//西暦
	$m = date( 'm' );					//月

	// 表示開始指定
	if( isset( $post_stamp ) ) {
		$y = date( 'Y', $post_stamp );
		$m = date( 'm', $post_stamp );
	}
	$to_jpy = date( 'Y' ) - 2018;		// 今年の和暦変換
	$d = 1;								// 日
	$z = date( 'z' ) + 1;				// 年内経過日数
	$dow = array( '', '月', '火', '水', '木', '金', '土', '日' );
	$dows = $dow[date( 'N' )];
	$today = date( 'Y年（令和'. $to_jpy .'年）第W週　m月d日（'. $dows .'曜日｜Y年'. $z .'日目）' );
	$first_stamp = mktime( 0, 0, 0, $m, 1, $y );					// 毎月1日0時0分0秒のタイムスタンプ
	$first_dow = date( "N", $first_stamp );							// 毎月1日の曜日を取得
	$g_t_stamp = mktime( 0, 0, 0, $m, $d, $y );						// 出力日0時0分0秒のタイムスタンプ
	$g_t_dow = date( "N", $g_t_stamp );								// 出力日の曜日
?>
<!-- Start of class=calendars -->
<section class="calendar">
	<p>本日は、<?= $today ?> です。</p>
	<table border="1">
		<caption><?= $y ?>年<?= $m ?>月</caption>
		<tr>
	{{-- 曜日出力 --}}
	@for( $dowc = 1; $dowc <= 7; $dowc++ )
		@if( $dowc == 6 )
			{{-- 土曜日 --}}
			<th style="color:#0000FF;">土</th>
		@elseif ( $dowc == 7 )
			{{-- 日曜日 --}}
			<th style="color:#FF0000;">日</th>
		@else
			{{-- 平日 --}}
			<th>{{$dow[$dowc]}}</th>
		@endif
	@endfor
	</tr>
	<tr>
	{{-- 毎月１日より前の部分 --}}
	@for( $blank = 1; $blank < $first_dow; $blank++ )
		<td>--</td>
	@endfor

	@for( $d = 1; checkdate( $m, $d, $y ); $d++ )
		@if( mktime( 0, 0, 0, date( "m" ), date( "d" ), date( "Y" ) ) == $g_t_stamp )
			<td><strong>{{$d}}</strong></td>
		@else
			<td>{{$d}}</td>
		@endif

		@if( $g_t_dow % 7 == 0 )
			</tr>
			@if( checkdate( $m, $d+1, $y ) )
			{{-- // 日曜日が月末の場合、checkdateで不整合となり次の行の開始タグが出力されない --}}
			{{-- // 日曜日が月末じゃない場合、checkdateがTRUEで帰ってくるので、次の行が開始される --}}
				<tr>
			@endif
		@endif
	@endfor
	@for( $last_dow = $g_t_dow; $last_dow < 7; $last_dow++ )
	{{-- // ※出力開始時点では、曜日カウント（$last_dow）は「曜日-1」の状態
	// （$last_dowにセットされるのが、「月末」の曜日の為）
	// 日曜日セル出力開始時点で曜日カウントは「6」（date関数上では日曜日は「7」なので混乱しないように注意） --}}
		<td>--</td>
		{{-- // for終端にて「$last_dow」が+1されるので、「$last_dow」が「6」の時に、行を閉じる --}}
		@if( $last_dow == 6 )
			</tr>
		@endif
	@endfor
	</table>
</section>
<!-- End of "class=calendars" -->