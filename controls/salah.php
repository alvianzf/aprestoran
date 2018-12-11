<?php


		echo '<script>
		var r= confirm("Username atau Password salah!");

		if (r == true)
			{
				window.location.href="../index.php";
			}else
			{
				window.alert("Tidak bisa melanjutkan proses");

				window.location.href="../index.php", 2000;

			}
			</script>';

?>