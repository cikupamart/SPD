
<?php
include("../library/koneksi.php");
?>
<?php
$edit = mysql_query("select * from user where Iduser='".$_SESSION['Iduser']."';");
$editDb = mysql_fetch_assoc($edit);
if($_POST["editpass"]){
			mysql_query("UPDATE user SET password = '".$_POST["password"]."' WHERE Iduser='".$_SESSION['Iduser']."';");
			echo "<meta http-equiv='refresh' content='0; url=?menu=logout'>";
			echo "<center><div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Berhasil menganti Password!!</b>
			</div><center>";
	}

?>
<div>
	<div class='panel panel-default'>
		<div class='panel-heading'>
			Aplikasi Panjar Pertamina
		</div>
		<div class='panel-body'>
			<form method="POST" class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-lg-4">No Pekerja</label>
							<div class="col-lg-4">
								<input type="text" name="username" autofocus required class="form-control" readonly value="<?php echo $editDb["username"];?>" select/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Nama</label>
							<div class="col-lg-4">
								<input type="text" name="username" autofocus required class="form-control" readonly value="<?php echo $editDb["nama"];?>" select/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Password</label>
							<div class="col-lg-4">
								<input type="password" name="password" autofocus required class="form-control" value="<?php echo $editDb["nama"];?>" select/>
							</div>
						</div>
						<div class="form-actions no-margin-bottom" style="text-align:center;">
							<input type="submit" name="editpass" value="Simpan" class="btn btn-primary" />
						</div>
					</form>																		
		</div>
	</div>
</div>
