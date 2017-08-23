<script type="text/javascript" src="../js/my.js"></script>
<?php
include("../library/koneksi.php");
session_start();
if($_SESSION["user"]!="" && $_SESSION["pass"]!=""){
?>
<?php
$row = 20;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM panjardb where no_pek='$_SESSION[Iduser]'";
$pageQry = mysql_query($pageSql, $server) or die ("error paging: ".mysql_error());
$jml	 = mysql_num_rows($pageQry);
$max	 = ceil($jml/$row);
?>

<div>
	<div class='panel panel-default'>
		<div class='panel-heading'>
			Aplikasi Panjar Pertamina 
		</div>
		<div class='panel-body'>
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>No Pekerja</th>
						<th>Nama Pekerja</th>
						<th>No Trip</th>
						<th>Tujuan Dinas</th>
						<th>Tujuan</th>
						<th>Tanggal Acara</th>
						<th>Tanggal Kembali</th>
						<th>Estimate Cost</th>
						<th width="120">Aksi</th>
					</tr>
				</thead>
			<?php
				
				$pjrSql = "SELECT * FROM panjardb where no_pek= '".$_SESSION['Iduser']."' ";
				$pjrQry = mysql_query($pjrSql , $server)  or die ("Query panjardb salah : ".mysql_error());
				$nomor  = 0 ; 
				while ($pjr = mysql_fetch_array($pjrQry)){
				$nomor++;
			?>
				<tbody>
					<tr>
						<td><?php echo  $nomor; ?></td> 
						<td><?php echo $pjr['no_pek'];?></td>
						<td><?php echo $pjr['nama_pek'];?></td>
						<td><?php echo $pjr['no_trip'];?></td>
						<td><?php echo $pjr['tujuan_dinas'];?></td>
						<td><?php echo $pjr['pan_tujuan'];?></td>
						<td><?php echo $pjr['tgl_acara'];?></td>
						<td><?php echo $pjr['tgl_kmbl'];?></td>
						<td><?php echo $pjr['cost'];?></td>
						<td>
						  <div class='btn-group'>
						  <a href="?menu=pjrdelete&aksi=hapus&nmr=<?php echo $pjr['id_panjar']; ?>" class="btn btn-xs btn-danger tipsy-kiri-atas" title="Hapus Data Ini" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENTING INI ... ?')"><img src='../image/hapus.png'/></a> 
						  <a href="?menu=edit_panjar&aksi=edit&nmr=<?php echo $pjr['id_panjar']; ?>" class="btn btn-xs btn-info tipsy-kiri-atas" title='Edit Data ini'><img src='../image/edit.png'/></a>
						  <a href="?menu=claim&aksi=edit&nmr=<?php echo $pjr['id_panjar']; ?>&panjar=<?php echo $pjr['cost'];?>" class="btn btn-xs btn-info tipsy-kiri-atas" title='Claim Panjar'><img src='../image/add.png'/></a>
						  </div>
						</td>
					</tr>
				</tbody>
			<?php } ?>
					<tr>
						<td colspan="6" align="right">
						<?php
						for($h = 1; $h <= $max; $h++){
							$list[$h] = $row*$h-$row;
							echo "<ul class='pagination pagination-sm'><li><a href='?menu=view&hal=$list[$h]'>$h</a></li></ul>";
						}
						?></td>
					</tr>
			</table>														
		</div>
	</div>
</div>
<?php
}else{
	header("Location:../index.php");
}
?>