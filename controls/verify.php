<?php
include 'config.php';

$username = @$_POST['username'];
$password = @$_POST['password'];
$go       = @$_POST['go'];

if($go)
{
	$sql = mysql_query("SELECT * FROM tb_users WHERE username='".$username."' AND password='".$password."'");
	$data = mysql_fetch_assoc($sql);
	$id=$data['id'];
	$cek = mysql_num_rows($sql);

	if($cek > 0)
	{
		header("location:../sessions.php?q=".$id."");
	}else
	{
		header("location:salah.php");
	}
}

?>