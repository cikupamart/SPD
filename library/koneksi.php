<?php
	$server = mysql_connect("mysql3.gear.host","dtbase","@12345678aj");
	$db = mysql_select_db("dtbase");
	
	if(!$server){
		echo "Maaf, Gagal tersambung dengan server !";
	}
	if(!$db){
		echo "Maaf, Gagal tersambung dengan database !";
	}
?>