<?php

include 'config.php';

$i = @$_GET ['i'];

$cek = mysql_query("DELETE FROM tb_reservasi WHERE id='$i'");

if($cek){
	header('location:../home.php?page=order#reserve');
}else
{
	echo "failed";
}

?>