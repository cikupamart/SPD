<?php
error_reporting(0);
session_start();
include("../library/variabel.php");
if($_SESSION["user"]!="" && $_SESSION["pass"]!=""){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

  <head id="Head">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Aplikasi Panjar</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">
	<link href="image/ptmn.ico" rel="shortcut icon" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	
	<style type="text/css">
        div.LateFuel
        {
            float: left;
            width: 800px;
            background: #B0E0E6;
            border-style: solid;
            border-width: 1px;
            margin: 2px;
        }
        #mainContents table tr td { padding:2px 4px; }
        .header-content h3 {
            font-size: 140%;
        }
        .text-right { text-align: right; }
        .text-center { text-align: center }
        .text-left { text-align: left; }
    </style>
  </head>
<body>

    <div class="container">
	
		<div class="col-md-12">
		<br>
		<div>
    <table><tr>
        	<td width="345"><img id="headerlogo" alt="PT.Pertamina" src='../image/logo-ptmn.gif' /></td>
        	<td>&nbsp;</td>
        	<td>&nbsp;</td>
        	<td width="243">&nbsp;</td>
          <td width="350" > <?php 
			echo "". date("l"). ",&nbsp";
			date_default_timezone_set('Asia/Jayapura');
			echo "". date("d-M-Y / h:i A")."";	
			?></td>
          <td width="243">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
            <td><img src='../image/logo.jpg' alt="Application Logo" id="appslogo" /></td>
            </tr></table>

        </div>
		
		  <nav class="navbar navbar-default" role="navigation">
				
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav" id="menu">
						<li>
							<a href="index.php">Home</a>
						</li>
						<li >
							<a href="?menu=create">Create</a>
						</li>
						<li >
							<a href="?menu=view">View</a>
						</li>
						
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						
						<li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account<strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
									<a><?=$_SESSION['nama'];?></a>
								</li>
								<li>
									<a href="?menu=editpass">Ubah Password</a>
								</li>
								<li>
									<a href="?menu=profile">Ubah Data Diri</a>
								</li>
								<li class="divider">
								</li>
								<li>
									<a href="logout.php"><i class="icon-signout"></i> Logout </a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
				
			</nav> 
			<?php
						if($_GET["menu"]){
							include_once("load.php");
						}else{
							echo "<div>
										<div class='panel panel-default'>
											<div class='panel-heading'>
												Aplikasi Panjar Pertamina
											</div>
											<div class='panel-body'>
												<p align='center' ><img  src='../image/logo.jpg' class='img-responsive' alt='Header SIRS'/><br>
												<label align='center'>SELAMAT DATANG DI APLIKASI PANJAR PERTAMINA </label>
												</p></center>
												
												
										</div>
									</div>";
						}
						?>
			<div id="footer">
            <div class="ptmn-line">
                <div class="col-left">
                    <div class="ptmn-red-hr">
                    </div>
                </div>
                <div class="col-middle">
                    <div class="ptmn-green-hr">
                    </div>
                </div>
                <div class="col-right">
                    <div class="ptmn-blue-hr">
                    </div>
                </div>
            </div>
			<div>
    <table><tr>
        	<td width="420"><div class="left">
                
            </div></td>
        	<td>&nbsp;</td>
        	<td>&nbsp;</td>
        	<td width="390">&nbsp;</td>
          
          
          <td>&nbsp;</td>
          <td>&nbsp;</td>
            <td align="right" width="400"><div class="right">
                <strong>PT. PERTAMINA (PERSERO)</strong><br />
                Jl. NIMBORAN NO 2 - 4 Jayapura - Papua<br />
                Phone : (+62)(21)  - Fax : (+62)(21) <br />
                
            </div></td>
            </tr></table>

        </div>
  </div>
</div>


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>

<?php
}else{
	header("Location:../index.php");
}
?>