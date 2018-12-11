<?php
include 'config.php';

$query 	= mysql_query("SELECT * FROM tb_makanan ORDER BY id DESC");
$food	= mysql_fetch_assoc($query);
$id 	= $food['id'];
$inc 	= $id+1;
$kode	= "ME00".$inc;

$namamakanan	= @$_POST['namamakanan'];
$hargamakanan	= @$_POST['hargamakanan'];
$tipemakanan	= @$_POST['tipemakanan'];
$deskripsi		= @$_POST['deskripsi'];
$simpan 		= @$_POST['simpan'];
$file 			= @$_FILES['gambar']['name'];
$temp			= @$_FILES['gambar']['tmp_name'];
$directory		= "../images/menu/";
$ext			= end((explode(".", $file)));
$sendto			= "images/menu/".$file;

if($simpan == "1")
{	
	echo $temp;
	$in 	= move_uploaded_file($temp, $directory.$file);
	$in1 	= mysql_query("INSERT INTO tb_makanan VALUES (NULL, '$kode', '$namamakanan', '$hargamakanan', '$tipemakanan' ,'$deskripsi', '$sendto')");
	
	if($in AND $in1)
	{
		header("location:../home.php?page=menu");
	}
}

?>