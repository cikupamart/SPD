<script type="text/javascript" src="../js/my.js"></script>
<?php
include("../library/koneksi.php");
?>
<?php
if($_POST["panjar"]){
			
			$no_pek = $_POST['no_pek'];
			$nama_pek = $_POST['nama_pek'];
			$no_trip = $_POST['no_trip'];
			$tujuan_dinas = $_POST['tujuan_dinas'];
			$pan_tujuan = $_POST['pan_tujuan'];
			$tgl_acara = $_POST['tgl_acara'];
			$tgl_kmbl = $_POST['tgl_kmbl'];
			$cost = $_POST['cost'];
			$query = mysql_query("insert into panjardb values ('','$no_pek','$nama_pek','$no_trip','$tujuan_dinas','$pan_tujuan','$tgl_acara','$tgl_kmbl','$cost')") or die(mysql_error());
			if ($query) 
			{
				echo"<script>document.location='?menu=view'</script>";
			}
}
			
if($_POST["tujuan"]){
			$nama_tujuan = $_POST['nama_tujuan'];			
			$query1 = mysql_query("insert into tujuan values ('','$nama_tujuan')") or die(mysql_error());
}
			if ($query1) {
	header('');
}tujuan();
?>

<div>
	<div class='panel panel-default'>
		<div class='panel-heading'>
			Aplikasi Panjar Pertamina
		</div>
		<div class='panel-body'>
			
			<form action="" method="POST" class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-lg-4">No Pekerja</label>
							<div class="col-lg-4">
								<input type="text" name="no_pek" autofocus required class="form-control" readonly value="<?=$_SESSION['Iduser'];?>" select/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Nama Pekerja</label>
							<div class="col-lg-4">
								<input type="text" name="nama_pek" autofocus required class="form-control" readonly value="<?=$_SESSION['nama'];?>" select/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">No Trip</label>
							<div class="col-lg-4">
								<input type="text" name="no_trip" autofocus required class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Tujuan Dinas</label>
							<div class="col-lg-4">
								<input type="text" name="tujuan_dinas" autofocus required class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Tujuan</label>
							<div class="col-lg-2">
							<select name="pan_tujuan" class="form-control">;
								<?php
									
									$tampil=mysql_query("SELECT * FROM tujuan ORDER BY id_tujuan");
									echo "<option value='belum milih' selected>Pilih Tujuan</option>";

									while($w=mysql_fetch_array($tampil))
									{
										echo "<option value=$w[nama_tujuan] selected>$w[nama_tujuan]</option>";        
									}
									 echo "</select>";
								?>
							</div>
							<div class="col-lg-2">
								<a href="#myModal3" class="btn btn-primary btn-rect" data-toggle="modal">Tambah</a><p>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Tanggal Keberangkatan</label>
							<div class="col-lg-2">
								<input type="date"  class="form-control" autofocus required placeholder="1998-05-09" name="tgl_acara" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Tanggal Kembali</label>
							<div class="col-lg-2">
								<input type="date"  class="form-control" autofocus required placeholder="1998-05-09" name="tgl_kmbl" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Estimate Cost &#40;Rp.&#41;</label>
							<div class="col-lg-4">
								<input type="text" class="form-control" autofocus required name="cost" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
							</div>
						</div>
						
						<div class="form-actions no-margin-bottom" style="text-align:center;">
							<input type="submit" name="panjar" value="Simpan" class="btn btn-primary" />
						</div>
					</form>																		
		</div>
	</div>
</div>
