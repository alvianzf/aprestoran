<?php

include 'config.php';

$nama = @$_POST['realname'];
$user = @$_POST['name'];
$pass = @$_POST['pass'];
$kont = @$_POST['whatsapp'];
$almt = @$_POST['alamat'];

	$arr = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'); // 
    shuffle($arr); // randomize array
    $arr = array_slice($arr, 0, 6); // get the first six (random) characters out
    $str = implode('', $arr); // balikin

$cek=mysql_query("SELECT * FROM tb_users WHERE username='".$user."'");
if (mysql_num_rows($cek) >0) {
	# code...
	echo '<script>window.alert("username sudah ada!");</script>';
	echo '<script>window.location.href="../home.php?page=adduser"</script>';
}else
{


$in = mysql_query("INSERT INTO tb_pegawai VALUES (NULL, '$nama', '$almt', 'Pelanggan', '$kont', '$str' )");
	if ($in) {

		$cek = mysql_fetch_assoc(mysql_query("SELECT * FROM tb_pegawai ORDER BY id DESC"));
		$id = $cek['id'];
		$in1 = mysql_query("INSERT INTO tb_users VALUES (NULL, '$user', '$pass', '$id', 'us', '0')");
		# code...
		if ($in1) {
			header("location:../home.php");
			# code...
		}else
		{

		echo "GAGAL";
		}
	}else
	{
		echo "GAGAL1";
	}
}

?>