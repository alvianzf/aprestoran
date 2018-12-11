<?php

session_start();

ob_start();

?>

<html>
<body>
<?php

include '../controls/config.php';

$i 		= @$_GET['i'];
$qry	= mysql_query("SELECT * FROM tb_penjualan WHERE monthname(tanggal) = '".$i."'");


?>
<barcode value="<?php echo $i;?>" ec="H"></barcode>

<h3 style="text-align:center">Laporan Keuangan</h3>
<h5 style="text-align:center">Bulan <?php echo $i; ?></h5>

<br/>

<table>
	<tr>
		<td></td>
		<td></td>
		<td style="width:100px">No</td>
		<td style="width:400px">Kode Faktur</td>
		<td style="width:400px">Tanggal Pemesanan</td>
		<td style="width:100px">Total Tagihan</td>
	</tr>

	<?php
	$no=1;
	$total=0;

	while ($data 	= mysql_fetch_assoc($qry)) {
		# code...

		?>
	<tr>
		<td></td>
		<td></td>
		<td><?php echo $no;?></td>
		<td><?php echo $data['kode_faktur'];?></td>
		<td><?php echo $data['tanggal'];?></td>
		<td><?php echo $data['total_bayar'];?></td>
	</tr>
	<?php
	$no++;

	$total=$total+$data['total_bayar'];
		}
	?>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td><h5>Total</h5></td>
		<td><?php echo $total;?></td>
	</tr>

	
</table>


</body>
</html>
<?php
/$html = ob_get_contents();
ob_end_clean();

$nama= $i.".pdf";
        
require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output( 'laporan_keuangan.pdf','D');
?>
