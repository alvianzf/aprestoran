<?php
include 'config.php';

$i 		= @$_GET['i'];
$total	= @$_GET['total'];
$bayar 	= @$_POST['bayar'];

$kembali = $bayar-$total;

	if($kembali < 0)
	{
		header('location:../home.php?page=finance&error=true&id='.$i);
	}

	else
	{

			$arr = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'); // 
		    shuffle($arr); // randomize array
		    $arr = array_slice($arr, 0, 8); // get the first six (random) characters out
		    $str = implode('', $arr); // balikin

		    $q = date('Y-m-d');

		$a = mysql_query("UPDATE tb_reservasi SET status='paid', kode_faktur='".$str."' WHERE id_user='".$i."' AND status='reserved'");

		if($a)
		{
			#header("location:../home.php?page=order");

			$in = mysql_query("INSERT INTO tb_penjualan VALUES (NULL, '$i', '$q', '$str', '$total', '$bayar', '$kembali')");
			header("location:../home.php?page=payment");
		}else
		{
			echo "failed";

			echo $kembali; 
			echo $str;
		}


			}
?>