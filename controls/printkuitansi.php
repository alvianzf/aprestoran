<?php

session_start();

ob_start();

?>

<html>
<body>
<?php

include '../controls/config.php';

$i 		= @$_GET['i'];
$qry	= mysql_query("SELECT * FROM tb_reservasi WHERE kode_faktur='".$i."'");


?>
<barcode value="<?php echo $i;?>" ec="H"></barcode>

<h3 style="text-align:center">Faktur Penjualan</h3>
<br/>

<table>
	<tr>
		<td></td>
		<td></td>
		<td style="width:100px">No</td>
		<td style="width:300px">Order</td>
		<td style="width:100px">Qty</td>
		<td style="width:100px">Subtotal</td>
	</tr>

	<?php
	$no=1;
	$total=0;

	while ($data 	= mysql_fetch_assoc($qry)) {
		# code...

		$a = mysql_query("SELECT * FROM tb_makanan WHERE id='".$data['id_makanan']."'");
		$b = mysql_fetch_assoc($a);

		?>
	<tr>
		<td></td>
		<td></td>
		<td><?php echo $no;?></td>
		<td><?php echo $b['nama_makanan'];?></td>
		<td><?php echo $data['qty'];?></td>
		<td><?php echo $data['subtotal'];?></td>
	</tr>
	<?php

	$total=$total+$data['subtotal'];

	$no++;
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

	<?php

	$data = mysql_fetch_assoc(mysql_query("SELECT * FROM tb_penjualan WHERE kode_faktur='".$i."'"));
	?>

	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td>Bayar</td>
		<td><?php echo $data['jumlah_uang'];?></td>
	</tr>

	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td>Kembali</td>
		<td><?php echo $data['kembali'];?></td>
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
$pdf->Output( 'faktur-'.$i.'.pdf','D');
?>
