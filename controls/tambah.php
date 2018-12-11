<?php

include 'config.php';
$qty = @$_POST['qty'];
$i   = @$_GET['i'];

$qry = mysql_query("SELECT * FROM tb_makanan WHERE id= '".$i."'");
$data= mysql_fetch_assoc($qry);

$harga= $data['harga_makanan'];

$userid= @$_GET['q'];

$subtotal = $harga * $qty;

$tgl = date("Y-m-d");

$in = mysql_query("INSERT INTO tb_reservasi VALUES (NULL, '$i', '$userid', '$tgl', NULL, '$qty', '$subtotal', 'waiting', NULL)");
if ($in)
{
	header("location:../home.php?page=order");
}else
{
	echo "salah, blog";
}

?>