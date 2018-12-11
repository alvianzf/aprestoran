<?php

include 'config.php';

$i    = @$_GET['i'];
$pass = @$_POST['password'];

$in = mysql_query("UPDATE tb_users SET password ='$pass' WHERE id='$i'");

if ($in) {
  # code...
  header('location:../home.php?page=main');
}else
{
  echo 'gagal';
  echo $i;
  echo $pass;
}

?>