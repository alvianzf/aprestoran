<?php
include 'config.php';

$namamakanan	= @$_POST['namamakanan'];
$hargamakanan	= @$_POST['hargamakanan'];
$tipemakanan	= @$_POST['tipemakanan'];
$deskripsi		= @$_POST['deskripsi'];
$kode 			= @$_POST['simpan'];
$file 			= @$_FILES['gambar']['name'];
$temp			= @$_FILES['gambar']['tmp_name'];
$directory		= "../images/menu/";
$ext			= end((explode(".", $file)));
$sendto			= "images/menu/".$file;

if($kode != NULL)
{	
	echo $temp;
	$in 	= move_uploaded_file($temp, $directory.$file);
	$in1 	= mysql_query("	UPDATE  tb_makanan
							SET 					nama_makanan  	='".$namamakanan."',
													harga_makanan   ='".$hargamakanan."',
													deskripsi 		='".$deskripsi."',
													pic 			='".$sendto."',
													jenis_makanan	='".$tipemakanan."'

											WHERE 	kode_makanan	='".$kode."'");
	
	if($in AND $in1)
	{
		header("location:../home.php?page=menu");
	}else
	{
		echo "failed";
		echo $kode;
		echo $namamakanan;
		echo $hargamakanan;
		echo $deskripsi;
		echo $tipemakanan;
	}
}
?>