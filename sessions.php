<?php

include 'controls/config.php';

$id = @$_GET['q'];

session_start();
	$sql 	= mysql_query("SELECT * FROM tb_users WHERE id='".$id."' ");
	$data 	= mysql_fetch_assoc($sql);

$_SESSION['id'] 	= $data['id'];
$_SESSION['uname'] 	= $data['username'];
$_SESSION['role'] 	= $data['role'];
$_SESSION['auth'] 	= $data['auth'];

	$sql_1	= mysql_query("SELECT * FROM tb_pegawai WHERE id = '".$data['pegawai_id']."'");
	$pegawai= mysql_fetch_assoc($sql_1);

$_SESSION['nama']	=$pegawai['nama'];
$_SESSION['alamat']	=$pegawai['alamat'];
$_SESSION['kontak']	=$pegawai['kontak'];
$_SESSION['posisi']	=$pegawai['posisi'];
$_SESSION['NIK']	=$pegawai['NIK'];

header("location:home.php");


?>