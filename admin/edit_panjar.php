<script type="text/javascript" src="../js/my.js"></script>
<?php
if($_GET["aksi"] && $_GET["nmr"]){
include_once("../library/koneksi.php");
$edit = mysql_query("select * from panjardb where id_panjar='".$_GET["nmr"]."'");
$editDb = mysql_fetch_assoc($edit);
	if($_POST["panjar"]){
			include_once("../library/koneksi.php");
			mysql_query("UPDATE datapasien SET no_pek = '".$_POST["no_pek"]."',nama_pek = '".$_POST["nama_pek"]."',no_trip = '".$_POST["no_trip"]."',pan_tujuan = '".$_POST["pan_tujuan"]."',tgl_acara = '".$_POST["tgl_acara"]."', cost = '".$_POST["cost"]."' WHERE Idpasien='".$_GET["nmr"]."'");
			echo "<meta http-equiv='refresh' content='0; url=?menu=view'>";
			echo "<center><div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Berhasil mengedit data!!</b>
			</div><center>";
	}
if($_POST["tujuan"]){
			$nama_tujuan = $_POST['nama_tujuan'];			
			$query1 = mysql_query("insert into tujuan values ('','$nama_tujuan')") or die(mysql_error());
}
			if ($query1) {
	header('location:index.php?menu=view');
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
								<input type="text" name="no_pek" autofocus required class="form-control" readonly value="<?php echo $editDb["no_pek"];?>" select/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Nama Pekerja</label>
							<div class="col-lg-4">
								<input type="text" name="nama_pek" autofocus required class="form-control" readonly value="<?php echo $editDb["nama_pek"];?>" select/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">No Trip</label>
							<div class="col-lg-4">
								<input type="text" name="no_trip" autofocus required class="form-control" value="<?php echo $editDb["no_trip"];?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Tujuan Dinas</label>
							<div class="col-lg-4" >
								<input type="text" name="tujuan_dinas" autofocus required class="form-control" value="<?php echo $editDb["tujuan_dinas"];?>"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Tujuan</label>
							<div class="col-lg-2">
							<select name="pan_tujuan" class="form-control" >;
								<?php
									
									$tampil=mysql_query("SELECT * FROM tujuan ORDER BY id_tujuan");
									echo "<option value='belum milih' selected>Pilih Tujuan</option>";
									echo "<option selected>$editDb[pan_tujuan]</option>";  
									while($w=mysql_fetch_array($tampil))
									{        
										echo "<option value=$w[nama_tujuan]>$w[nama_tujuan]</option>";        
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
								<input type="date"  class="form-control" autofocus required placeholder="1998-05-09" name="tgl_acara" value="<?php echo $editDb["tgl_acara"];?>"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Tanggal Kembali</label>
							<div class="col-lg-2">
								<input type="date"  class="form-control" autofocus required placeholder="1998-05-09" name="tgl_kmbl" value="<?php echo $editDb["tgl_kmbl"];?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Estimate Cost &#40;Rp.&#41;</label>
							<div class="col-lg-4">
								<input type="text" class="form-control" autofocus required id="inputku" name="cost" value="<?php echo $editDb["cost"];?>" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
							</div>
						</div>
						
						<div class="form-actions no-margin-bottom" style="text-align:center;">
							<a href="?menu=administrasi_cetak&aksi=edit&nmr=<?php echo $data['id_adm']; ?>" class="btn btn-primary" > Cetak </a>
							<input type="submit" name="panjar" value="Simpan" class="btn btn-primary" />
						</div>
					</form>																		
		</div>
	</div>
</div>
<?php } ?>