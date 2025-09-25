<h1>カレンダー</h1>
<section class="calendars">
	<table border="1">
		<caption>{$this->y}年{$this->m}月</caption>
		<tr>
<?php
	$dow = array( '', '月', '火', '水', '木', '金', '土', '日' );

	for( $dowc = 1; $dowc <= 7; $dowc++ ) {
	// 曜日出力
		if( $dowc == 6 ) {
			// 土曜日
			echo "<th style=\"color:#0000FF;\">{$dow[$dowc]}</th>";
		} elseif ( $dowc == 7 ) {
			// 日曜日
			echo "<th style=\"color:#FF0000;\">{$dow[$dowc]}</th>";
		} else {
			// 平日
			echo "<th>{$dow[$dowc]}</th>";
		}
	}
	echo "</tr>\n";
	$first_stamp = mktime( 0, 0, 0, $this->m, 1, $this->y );		// 毎月1日0時0分0秒のタイムスタンプ
	$first_dow = date( "N", $first_stamp );		// 毎月1日の曜日を取得
	echo "<tr>\n";
	for( $blank = 1; $blank < $first_dow; $blank++ ) {
	// 毎月１日より前の部分
		echo "<td>--</td>";
	}
	for( $d = 1; checkdate( $this->m, $d, $this->y ); $d++ ) {
		$g_t_stamp = mktime( 0, 0, 0, $this->m, $d, $this->y );		// 出力日のタイムスタンプ
		if( mktime( 0, 0, 0, date( "m" ), date( "d" ), date( "Y" ) ) == $g_t_stamp ) {

		} else {
			echo "<td><a href=\"days.php?day={$g_t_stamp}&amp;mode={$mode}\">{$d}</a></td>";
		}
		if( date( "N", $g_t_stamp ) % 7 == 0 ) {
			echo "\n</tr>\n";
			if( checkdate( $this->m, $d+1, $this->y ) ) {
			// 日曜日が月末の場合、checkdateで不整合となり次の行の開始タグが出力されない
			// 日曜日が月末じゃない場合、checkdateがTRUEで帰ってくるので、次の行が開始される
				echo "<tr>\n";
			}
		}
	}
	for( $last_dow = date( "N", $g_t_stamp ); $last_dow < 7; $last_dow++ ) {
	// ※出力開始時点では、曜日カウント（$last_dow）は「曜日-1」の状態
	// （$last_dowにセットされるのが、「月末」の曜日の為）
	// 日曜日セル出力開始時点で曜日カウントは「6」（date関数上では日曜日は「7」なので混乱しないように注意）
		echo "<td>--</td>";
		if( $last_dow == 6 ) {
		// for終端にて「$last_dow」が+1されるので、「$last_dow」が「6」の時に、行を閉じる
			echo "\n</tr>\n";
		}
	}
?>
</table>
</section>