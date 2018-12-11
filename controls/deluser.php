<?php

include 'config.php';

$user = @$_GET['i'];
$peg  = @$_GET['q'];

$del = mysql_query("DELETE FROM tb_users WHERE id = '".$user."'");
$let = mysql_query("DELETE FROM tb_pegawai WHERE id='".$peg."'");

if($del AND $let)
{
	header('location:../home.php');
}else
{
	echo 'gagal';
}

?>