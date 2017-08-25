<script type="text/javascript" src="../js/my.js"></script>
<?php
include("../library/koneksi.php");
session_start();
if($_SESSION["user"]!="" && $_SESSION["pass"]!=""){
?>
<?php
$row = 20;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$user = "SELECT * FROM user";
$Users = mysql_query($user, $server) or die ("error paging: ".mysql_error());
$jml	 = mysql_num_rows($user);
$max	 = ceil($jml/$row);
?>

<div>
	<div class='panel panel-default'>
		<div class='panel-heading'>
			Aplikasi Panjar Pertamina 
		</div>
		<div class='panel-body'>
            <a href="#user" class="btn btn-primary btn-rect pull-right" data-toggle="modal">Tambah</a>
        
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Jabatan</th>
						<th>Penempatan</th>
						<th>Username</th>
						<th>Akses</th>
					</tr>
				</thead>
			<?php
				$nomor  = 0 ; 
				while ($DataUsers = mysql_fetch_array($Users)){
				$nomor++;
			?>
				<tbody>
					<tr>
						<td><?php echo  $nomor; ?></td> 
						<td><?php echo $DataUsers['nama'];?></td>
						<td><?php echo $DataUsers['jabatan'];?></td>
						<td><?php echo $DataUsers['penempatan'];?></td>
						<td><?php echo $DataUsers['username'];?></td>
						<td><?php echo $DataUsers['hakakses'];?></td>
					</tr>
				</tbody>
			<?php } ?>
					<tr>
						<td colspan="10" align="center">
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

if(isset($_POST['adduser']))
{
    $nama       = $_POST['nama'];
    $jabatan    = $_POST['jabatan'];
    $penempatan = $_POST['penempatan'];
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    $repassword = $_POST['repassword'];
    $akses      = $_POST['akses'];
    if($password==$repassword)
    {
        $md5 = md5($password);
        $User= mysql_query("Select * from user where username='$username'")or die(mysql_error());
        $Cek = mysql_num_rows($User);
        if($Cek==0)
        {
            $Insert = mysql_query("insert into user values('','$username','$md5','$nama','$jabatan','$penempatan','$akses')")or die(mysql_error());
            if($Insert)
            {
                echo"<script>alert('Sucsess')</script>";
                echo"<script>document.location='?menu=user'</script>";
            }
            
        }
        
    }else
    echo"<script>alert('Password Salah')</script>";
}
?>