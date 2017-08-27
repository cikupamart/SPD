<?php
      $pagi=0;
      $siang=0;
      $malam=0;
      $lain=0;
      $hrglain=0;
      $Daily_Allowence=0;
      $Acco=array();
      $com=0;
      $hcom=0;
      $BiayaAco=array();
      $SubtotalAco=0;
      $a=0;
    include("../library/koneksi.php");
    if(isset($_GET['aksi'])=="print")
    {      
        $Panjars = mysql_query("select * from panjardb,user where panjardb.no_pek=user.username and panjardb.id_panjar='$_GET[IdPanjar]'")or die(mysql_error());
        $DataPanjars=mysql_fetch_array($Panjars);
?>
    <div>
       <img src='../image/logo-ptmn.gif' align="right" />
    </div>
    <br><br><br>
	<h3 align="center">LAPORAN PERJALANAN DINAS DALAM NEGERI</h3><br>
            <table border="0">
			<tr>
                <td>Nomor Pekerja</td>
                    <td>:</td>
                    <td>
                        <b><?php echo $DataPanjars[1];?></b>
                    </td>
                </tr>
                <tr>
                    <td>Nama Pekerja</td>
                    <td>:</td>
                    <td>
                        <b><?php echo $DataPanjars[12];?></b>
                    </td>
                </tr>
                <tr>
                    <td>Nomor Trip</td>
                    <td>:</td>
                    <td>
                        <?php echo $DataPanjars[3];?>
                    </td>
                </tr>
                <tr>
                    <td>Tujuan</td>
                    <td>:</td>
                    <td>
                        <?php echo $DataPanjars[5];?>
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Keberangkatan</td>
                    <td>:</td>
                    <td>
                        <?php echo $DataPanjars[6];?>
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Kembali</td>
                    <td>:</td>
                    <td>
                        <?php echo $DataPanjars[7];?>
                    </td>
                </tr>
            </table>
        </div>
    </center>
    <h3>RINCIAN MAKAN</h3>
    <table border="2">
        <thead>
            <tr>
                <th style="vertical-align: center" rowspan="2" text=center align=center>No</th>
                <th rowspan="2">Tanggal</th>
                <th colspan="5" align="center">Tujangan Makan</th>
                <th rowspan="2" align="center" valign="middle">Accommodation</th>
                <th rowspan="2" align="center" valign="middle">Harga (Rp)</th>
                <th rowspan="2" align="center" valign="middle">Daily Allowance</th>
                <th rowspan="2" align="center" valign="middle">Keterangan</th>
            </tr>
            <tr>
                <th align=center valign="middle">Makan Pagi</th>
                <th align="center" valign="middle">Makan Siang</th>
                <th>Makan Malam</th>
                <th>Makan lainnya</th>
                <th>Harga (Rp)</th>
            </tr>
            <?php
                $no=1;
                $makan= mysql_query("Select * from transmakan where id_panjar='$_GET[IdPanjar]'")or die(mysql_error());
                while($dbmakans=mysql_fetch_array($makan))
                {
                    ?>
                <tr>
                    <th>
                        <?php echo $no;?>
                    </th>
                    <th>
                        <?php echo $dbmakans[2]?>
                    </th>
                    <th>
                        <?php echo $dbmakans[3]?>
                    </th>
                    <th>
                        <?php echo $dbmakans[4]?>
                    </th>
                    <th>
                        <?php echo $dbmakans[5]?>
                    </th>
                    <th>
                        <?php echo $dbmakans[6]?>
                    </th>
                    <th>
                        <?php echo number_format($dbmakans[7],"0",",",".");?>
                    </th>
                    <th>
                        <?php echo $dbmakans[9]?>
                    </th>
                    <th>
                        <?php echo number_format($dbmakans[10],"0",",",".");?>
                    </th>
                    <th>
                        <?php echo $dbmakans[8]?>
                    </th>
                    <th>
                        <?php echo $dbmakans[11]?>
                    </th>
                </tr>
                <?php 
                $pagi+=$dbmakans['mkn_pg'];
                $siang+=$dbmakans['mkn_sg'];
                $malam+=$dbmakans['mkn_ml'];
                $lain+= $dbmakans['dll'];
                $hrglain+= ($dbmakans['dll']*$dbmakans['hrglain']);
                $Daily_Allowence+= $dbmakans['daily'];
                $com+=$dbmakans['acomodation'];
                $hcom+=$dbmakans['acomodation']*$dbmakans['BiayaAcom'];
                $Acco[]=array('acomo'=>$dbmakans['acomodation'], 'biaya'=>$dbmakans['BiayaAcom']);
                }
            ?>

                <tr>
                    <th colspan="2">Jumlah</th>
                    <td align="center">
                        <?php echo $pagi;?>
                    </td>
                    <td align="center">
                        <?php echo $siang;?>
                    </td>
                    <td align="center">
                        <?php echo $malam;?>
                    </td>
                    <td align="center">
                        <?php echo $lain;?>
                    </td>
                    <td align="center">
                        <?php echo number_format($hrglain,"0",",",".");?>
                    </td>
                    <td align="center">
                        <?php echo $com;?>
                    </td>
                    <td align="center">
                        <?php echo number_format($hcom,"0",",",".");?>
                    </td>
                    <td align="center">
                        <?php echo $Daily_Allowence;?>
                    </td>
                    <td></td>
                </tr>
        </thead>
    </table>
    <h3>RINCIAN TRANSPORTASI</h3>
    <table border="2" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>From</th>
                <th>To</th>
                <th>Quantity</th>
                <th>Jenis Transportasi</th>
                <th>Harga (Rp)</th>
                <th>Total (Rp)</th>
                <th>Keterangan</th>
            </tr>
            <?php
            $notrans=1;
            $transport=mysql_query("select * from transportasi where id_panjar='$_GET[IdPanjar]'")or die(mysql_error());
            while($dataTransport=mysql_fetch_array($transport))
            { 
            ?>
                <tr>
                    <th>
                        <?php echo $notrans;?>
                    </th>
                    <th>
                        <?php echo date("d F Y", strtotime($dataTransport['tgl_trans']));?>
                    </th>
                    <th>
                        <?php echo $dataTransport['asal'];?>
                    </th>
                    <th>
                        <?php echo $dataTransport['tujuan'];?>
                    </th>
                    <th>
                        <?php echo $dataTransport['qty'];?>
                    </th>
                    <th>
                        <?php echo $dataTransport['jns_trans'];?>
                    </th>
                    <th>
                        <?php echo number_format(preg_replace("/[^0-9]/", "", $dataTransport['harga']),"0",",",".");?>
                    </th>
                    <td align="center">
                        <?php echo number_format(preg_replace("/[^0-9]/", "", $dataTransport['harga'])*$dataTransport['qty'],"0",",","."); ?> </td>
                    <th>
                        <?php echo $dataTransport['keterangan'];?>
                    </th>
                </tr>
                <?php
            $a+=(preg_replace("/[^0-9]/", "", $dataTransport['harga'])*$dataTransport['qty']);
            $notrans++;            
            }
            ?>
                    <tr>
                        <th colspan="7">Jumlah</th>
                        <th>
                            <?php echo number_format($a,"0",",",".");?>
                        </th>
                        <th></th>
                    </tr>
        </thead>
    </table>
    <h3 align="left">PERHITUNGAN RINCIAN PANJAR</h3>
    <table width="60%">
        <tr>
            <th colspan="7" align="left">Meal Allowence</th>
        </tr>
        <tr>
            <td>Uang Makan Pagi</td>
            <td>
                <?php echo $pagi;?>
            </td>
            <td>x</td>
            <td align="right">75.000</td>
            <td>=</td>
            <td>Rp.</td>
            <td align="right">
                <?php echo number_format($pagi*75000,"0",",",".");?>
            </td>
        </tr>
        <tr>
            <td>Uang Makan Siang</td>
            <td>
                <?php echo $siang;?>
            </td>
            <td>x</td>
            <td align="right">75.000</td>
            <td>=</td>
            <td>Rp.</td>
            <td align="right">
                <?php echo number_format($siang*75000,"0",",",".");?>
            </td>
        </tr>
        <tr>
            <td>Uang Makan Malam</td>
            <td>
                <?php echo $malam;?>
            </td>
            <td>x</td>
            <td align="right">75.000</td>
            <td>=</td>
            <td>Rp.</td>
            <td align="right">
                <?php echo number_format($malam*75000,"0",",",".");?>
            </td>
        </tr>
        <tr>
            <td>Uang Makan Ada Invoice</td>
            <td></td>
            <td></td>
            <td align="right"></td>
            <td>=</td>
            <td>Rp.</td>
            <td align="right">
                <?php echo number_format($lain*$hrglain,"0",",",".");?>
            </td>
        </tr>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th>Total</th>
            <th>=</th>
            <th>Rp.</th>
            <th align="right">
                <?php echo number_format(($pagi*75000)+($siang*75000)+($malam*75000)+($hrglain),"0",",",".");?>
            </th>
        </tr>
        <tr>
            <td colspan="7"><br></td>
        </tr>
        <tr>
            <th colspan="7" align="left">Accomodation</th>
        </tr>
        <?php
        foreach($Acco as $item)
        {
            $SubtotalAco+=($item['acomo']*$item['biaya']);
        ?>
            <tr>
                <td>Accomodation</td>
                <td>
                    <?php echo $item['acomo']?>
                </td>
                <td>x</td>
                <td align="right">
                    <?php echo number_format($item['biaya'],"0",",",".");?>
                </td>
                <td>=</td>
                <td>Rp.</td>
                <td align="right">
                    <?php echo number_format($item['acomo']*$item['biaya'],"0",",",".")?>
                </td>
            </tr>
            <?php
        }
        ?>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Total</th>
                    <th>=</th>
                    <th>Rp.</th>
                    <th align="right">
                        <?php echo number_format($SubtotalAco,"0",",",".");?>
                    </th>
                </tr>
                <tr>
                    <td colspan="7"><br></td>
                </tr>
                <tr>
                    <th align="left">Daily Allowence</th>
                    <th width="10%">
                        <?php echo $Daily_Allowence;?>
                    </th>
                    <th width="10%">x</th>
                    <th align="right">100.000</th>
                    <th>=</th>
                    <th>Rp.</th>
                    <th align="right">
                        <?php echo number_format($Daily_Allowence*100000,"0",",",".");?>
                    </th>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="7"><br></td>
                </tr>

    </table>

    <?php
    $STtl=$SubtotalAco+($malam*75000)+($siang*75000)+($pagi*75000)+$hrglain+($Daily_Allowence*100000)+$a;
    ?>
            <table>
                <tr>
                    <th width="45%" align="left">Sub Total</th>
                    <th>=</th>
                    <th>Rp.</th>
                    <th width="40%" align="right">
                        <?php echo number_format($STtl,"0",",",".");?>
                    </th>
                </tr>
				<tr>
                    <th width="45%" align="left">Panjar Dinas</th>
                    <th>=</th>
                    <th>Rp.</th>
                    <th width="40%" align="right">
                        <?php echo number_format(preg_replace("/[^0-9]/","", $_GET['uangpanjar']),"0",",",".");?>
                    </th>
                </tr>
				<tr>
							<th width="45%" align="left">Total Claim</th>
							<th>=</th>
							<th>Rp.</th>
							<th width="40%" align="right">
								<b><?php echo number_format($STtl-preg_replace("/[^0-9]/","", $_GET['uangpanjar']),"0",",",".");?></b>
							</th>
						</tr>
            </table>
			
			<?php
                $ttds = mysql_query("select * from ttd where id_panjar='$_GET[IdPanjar]'")or die(mysql_error());
				$Datattd = mysql_fetch_array($ttds));
				{
					
                    ?>
					
<table width="600" align="center">
	<tr>
    	<td width="300" align=center ></td>
        <td width="300" align=center ><?php echo $Datattd['tempattgl'];?></td>
    </tr>
	<tr>
    	<td width="300" align=center ><?php echo $Datattd[4];?></td>
        <td width="300" align=center >Pemohon Claim</td>
    </tr>
    <tr>
    	<td width="300" height="74">&nbsp;</td>
        <td width="300" height="74" >&nbsp;</td>
  </tr>
    <tr>
    	<td width="300" align=center ><?php echo $Datattd[5];?></td>
        <td width="300" align=center >Pemohon Claim</td>
    </tr>
    <tr>
    	<td colspan="2" align=center >Mengetahui</td>
    </tr>
	<tr>
    	<td colspan="2" align=center ><?php echo $Datattd[7];?></td>
    </tr>
    <tr>
    	<td colspan="2" height="74">&nbsp;</td>
    </tr>
    <tr>
   	  <td colspan="2" align=center><?php echo $Datattd[6];?></td>
    </tr>
</table>
<?php
    }
?>
        
<?php
    }
?>
<script>
            window.print();
        </script>
