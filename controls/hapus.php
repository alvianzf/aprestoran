<?php

include 'config.php';

$i = @$_GET ['id'];

$cek = mysql_query("DELETE FROM tb_makanan WHERE id='$i'");

if($cek){
	header('location:../home.php?page=menu');
}else
{
	echo "failed";
}

?>