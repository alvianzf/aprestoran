<?php

session_start();

ob_start();

?>

<html>
<body>
<?php

include '../controls/config.php';

$i 		= @$_GET['i'];
$qry	= mysql_query("SELECT DISTINCT kode_faktur FROM tb_reservasi");


?>
<barcode value="<?php echo $i;?>" ec="H"></barcode>

<h3 style="text-align:center">Laporan Reservasi</h3>
<br/>

<table>
	<tr>
		<td></td>
		<td></td>
		<th style="width:100px">No</th>
		<th style="width:100px">Kode Faktur</th>
		<th style="width:200px">Nama Pemesan</th>
		<th style="width:100px">Tanggal</th>
		<th style="width:100px">Qty</th>
		<th style="width:100px">Total</th>
	</tr>

	<?php
	$no=1;

	while ($data 	= mysql_fetch_assoc($qry)) {
		# code...

		$a= mysql_fetch_assoc(mysql_query("SELECT * FROM tb_reservasi WHERE kode_faktur='".$data['kode_faktur']."'"));
		$b= mysql_fetch_assoc(mysql_query("SELECT * FROM tb_users WHERE id='".$a['id_user']."'"));
		$peg = mysql_fetch_assoc(mysql_query("SELECT * FROM tb_pegawai WHERE id -'".$b['pegawai_id']."'"));
		$qty = mysql_fetch_assoc(mysql_query("SELECT SUM(qty) AS qty_1 FROM tb_reservasi WHERE kode_faktur='".$data['kode_faktur']."'"));
		$ttl = mysql_fetch_assoc(mysql_query("SELECT SUM(subtotal) AS ttl FROM tb_reservasi WHERE kode_faktur='".$data['kode_faktur']."'"));

		?>
	<tr>
		<td></td>
		<td></td>
		<td><?php echo $no;?></td>
		<td><?php echo $data['kode_faktur'];?></td>
		<td><?php echo $peg['nama'];?></td>
		<td><?php echo $a['tanggal'];?></td>
		<td><?php echo $qty['qty_1'];?></td>
		<td><?php echo $ttl['ttl'];?></td>
	</tr>
	<?php
	$no++;

		}
	?>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td>Jumlah Reservasi</td>
		<td style="align:right"><?php echo $no;?></td>
	</tr>

	
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
