<?php

session_start();

ob_start();

?>

<html>
<body>
<?php

include '../controls/config.php';

$i 		= @$_GET['i'];
$qry	= mysql_query("SELECT * FROM tb_pegawai WHERE posisi='user'");


?>
<barcode value="<?php echo $i;?>" ec="H"></barcode>

<h3 style="text-align:center">Laporan Pelanggan Aktif</h3>
<br/>

<table>
	<tr>
		<td></td>
		<td></td>
		<th style="width:100px">No</th>
		<th style="width:200px">Nama</th>
		<th style="width:100px">Alamat</th>
		<th style="width:100px">Nomor Kontak</th>
		<th style="width:100px">Username</th>
	</tr>

	<?php
	$no=1;

	while ($data 	= mysql_fetch_assoc($qry)) {
		# code...
		$v = mysql_query("SELECT * FROM tb_users WHERE pegawai_id='".$data['id']."'");
		$r = mysql_fetch_assoc($v);

		?>
	<tr>
		<td></td>
		<td></td>
		<td><?php echo $no;?></td>
		<td><?php echo $data['nama'];?></td>
		<td><?php echo $data['alamat'];?></td>
		<td><?php echo $data['kontak'];?></td>
		<td><?php echo $r['username'];?></td>
	</tr>
	<?php
	$no++;

		}
	?>

	
</table>


</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();

$nama= $i.".pdf";
        
require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output( 'laporan_pengguna.pdf','D');
?>
