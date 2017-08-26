<?php
include_once("../library/koneksi.php");
if(isset($_GET['aksi'])=="hapus"){
		//echo "<script>alert('Sucsess')</script>";
		$del = "DELETE FROM transmakan WHERE id_makan ='".$_GET["id_makan"]."'";
		$delDb = mysql_query($del,$server) or die("Error hapus data ".mysql_error());
		if($delDb){
			echo "<script>document.location='?menu=claim&aksi=edit&nmr=$_GET[id_panjar]&panjar=$_GET[uangpanjar]'</script>";
		}
}
?>