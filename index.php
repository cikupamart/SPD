


 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head id="Head"><title>
	.:: Login ::.
</title><link href="image/ptmn.ico" rel="SHORTCUT ICON" /><link href="css/style.css" rel="Stylesheet" type="text/css" /><link href="css/asp-menu.css" rel="Stylesheet" type="text/css" /><link href="css/gridview.css" rel="Stylesheet" type="text/css" /><link href="css/layout.css" rel="Stylesheet" type="text/css" />
    
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

    <!-- Bootstrap core CSS -->
    <link href="css/additional/datepicker.css" rel="stylesheet" />
        
        
    </head>
<body>
<?php
error_reporting(0);
session_start();
include_once("library/koneksi.php");

if(isset($_POST['login'])){ //jika tombol Login diklik
	$user=$_POST["user"];
	$pass=md5($_POST["pass"]);
	
	if($user!="" && $pass!=""){
		include_once("library/koneksi.php");
		$em = mysql_query("select * from user where password = '$pass' AND username = '$user'");
		$data = mysql_fetch_array($em);
		$cek = mysql_num_rows($em);
		
		if($cek>0){			
				echo "<div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					Data Telah Ditemukan!!.
                  </div>";
                $_SESSION["Iduser"]=$data["Iduser"];
				$_SESSION["user"]=$data["username"];
				$_SESSION["pass"]=$data["password"];
				$_SESSION["nama"] = $data["nama"];
				$_SESSION["jabatan"] = $data["jabatan"];
				$_SESSION["penempatan"] = $data["penempatan"];
				$_SESSION["hash"] = $data["hakakses"];
			if($data['hakakses']=="User")
			{				
				echo"<script>alert('Selamat datang $_SESSION[nama]')</script>";
				echo"<script>document.location='user/index.php'</script>";
					
			}elseif($data['hakakses']=="Admin")
			{				
				echo"<script>alert('Selamat datang $_SESSION[nama]')</script>";
				echo"<script>document.location='admin/index.php'</script>";
			}
			
		}else{
			echo "<center><div class='alert alert-warning alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Data Tidak Ditemukan!!</b>
                  </div><center>";
		}
	}

}
?>    
    

    <div id="container">
        <div id="tops">
            <span id="datetime"> <?php 
			echo "". date("l"). ",&nbsp";
			date_default_timezone_set('Asia/Jayapura');
			echo "". date("d-M-Y / h : i : A")."";?></span>
        </div>
        <div id="header">
            <img id="headerlogo" alt="PT.Pertamina" src='image/logo-ptmn.gif' />
            <img id="appslogo" alt="Application Logo" src='image/logo.jpg' />
        </div>
        <div id="menu">
            <b class="spiffy-rounded"><b class="spiffy-rounded1"><b></b></b><b class="spiffy-rounded2">
                <b></b></b><b class="spiffy-rounded3"></b><b class="spiffy-rounded4"></b><b class="spiffy-rounded5">
                </b></b>
            <div class="spiffy-roundedfg">

            </div>
            <div class="spiffy-rounded-bottomfg">
            </div>
            <b class="spiffy-rounded-bottom"><b class="spiffy-rounded-bottom5"></b><b class="spiffy-rounded-bottom4">
            </b><b class="spiffy-rounded-bottom3"></b><b class="spiffy-rounded-bottom2"><b></b></b>
                <b class="spiffy-rounded-bottom1"><b></b></b></b>
        </div>
        <div id="headerinfo">
            <div class="left">
                
            </div>
            <div class="right">
            </div>
        </div>
        <div id="INFO" class="hide">
        </div>
      
        <div id="mainContents">
            <blockquote>
                
    <link href="css/web.ui.login.css" rel="Stylesheet" type="text/css" />
    <div id="outer">
        <div id="middle">
            <div id="inner">
                <div class="title0">
                    <img alt="login" src='image/login.gif' />
                    Sign-In
                </div>
                <blockquote>
                    <table id="ContentPlaceHolder1_Login1" class="login-content" cellspacing="0" cellpadding="0" style="width:100%;border-collapse:collapse;">
	<tr>
		<td>
		<form class="login"  action="" method="post">
                            <table border="0" cellpadding="0" width="100%">
                                <tr>
                                    <td align="left" style="width: 80px;">
                                        <label for="ContentPlaceHolder1_Login1_UserName" id="ContentPlaceHolder1_Login1_UserNameLabel" class="font-control-style">User Name</label>
                                    </td>
                                    <td>
                                        <span>:</span>
                                    </td>
                                    <td align="left">
                                        <input name="user" type="text" maxlength="10" id="ContentPlaceHolder1_Login1_UserName" class="txt-style-mandatory" style="width:100px;" />
                                        <span id="ContentPlaceHolder1_Login1_UserNameRequired" title="User Name is required." style="visibility:hidden;">*</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left">
                                        <label for="ContentPlaceHolder1_Login1_Password" id="ContentPlaceHolder1_Login1_PasswordLabel" class="font-control-style">Password</label>
                                    </td>
                                    <td>
                                        <span>:</span>
                                    </td>
                                    <td align="left">
                                        <input name="pass" type="password" maxlength="15" id="ContentPlaceHolder1_Login1_Password" class="txt-style-mandatory" style="width:100px;" />
                                        <span id="ContentPlaceHolder1_Login1_PasswordRequired" title="Password is required." style="visibility:hidden;">*</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left">
                                    </td>
                                    <td>
                                    </td>
                                    <td style="height: 30px" valign="top">
                                        <input type="submit" name="login" value="Log In" id="ContentPlaceHolder1_Login1_LoginButton" style="width:100px;" />
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" colspan="3" style="text-align: center; color: red; font-size: 8pt">
                                        
                                    </td>
                                </tr>
                            </table>
                        </td>
	</tr>
</table>
                </blockquote>
            </div>
        </div>
    </div>
    
    

            </blockquote>
        </div>
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
            <div class="left">
                <strong>Corporate Shared Service</strong><br />
                Jl. Medan Merdeka Timur No. 1 A Jakarta - 10110 INDONESIA<br />
                Gd. Annex, Lantai 1
            </div>
            <div class="right">
                <strong>PT. PERTAMINA (PERSERO)</strong><br />
                Jl. Medan Merdeka Timur No. 1 A Jakarta - 10110 INDONESIA<br />
                Phone : (+62)(21) 7917 3000 - Fax : (+62)(21) 7972 177<br />
                E-mail : <a href="mailto:pcc@pertamina.com">pcc@pertamina.com</a><br />
            </div>
        </div>
    </div>
    

</body>
</html>
