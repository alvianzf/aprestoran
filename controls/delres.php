<?php

include 'config.php';

$i = @$_GET ['id'];

$cek = mysql_query("DELETE FROM tb_reservasi WHERE id_user='$i' AND status='reserved'");

if($cek){
	header('location:home.php?page=payment');
}else
{
	echo "failed";
}

?>