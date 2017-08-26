<?php
	$server = mysql_connect("localhost","id2709169_root","123456");
	$db = mysql_select_db("id2709169_spd");
	
	if(!$server){
		echo "Maaf, Gagal tersambung dengan server !";
	}
	if(!$db){
		echo "Maaf, Gagal tersambung dengan database !";
	}
?>