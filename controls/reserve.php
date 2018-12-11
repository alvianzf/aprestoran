<?php
include 'config.php';

$i 		= @$_GET['i'];
$meja 	= @$_POST['meja'];

$a = mysql_query("UPDATE tb_reservasi SET status='reserved', meja='".$meja."' WHERE id_user='".$i."' AND status='waiting'");

if($a)
{
	header("location:../home.php?page=vieworder");
}else
{
	echo "failed";
	echo $meja; 
}


?>