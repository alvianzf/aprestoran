<?php

	include 'config.php';

	$bulan = mysql_query("SELECT tanggal FROM tb_reservasi WHERE status='paid'");
?>