<?php

if (@$_GET['page'] == NULL)
{
  $s="../c";
}else
{
  $s="c";
}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Tambah Pengguna</title>
    <!-- Bootstrap -->
    <link href="../src/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../src/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="../src/assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="../src/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body id="login">
    <br/>
    <br/>
    <br/>
    <div class="container">

      <form class="form-signin" method="post" action="<?php echo $s;?>ontrols/signin.php">
        <h2 class="form-signin-heading">Tambah Pengguna</h2>
        <input type="text" class="input-block-level" placeholder="User Name" name="name">
        <input type="text" class="input-block-level" placeholder="Nama Lengkap" name="realname">
        <input type="text" class="input-block-level" placeholder="Nomor Kontak/ Whatsapp" name="whatsapp">
        <input type="text" class="input-block-level" placeholder="Alamat" name="alamat">
        <input type="password" class="input-block-level" placeholder="Masukkan Password" name="pass">
        <button class="btn btn-large btn-primary btn-block" type="submit" name="go" value="1">Daftar</button>
      </form>

    </div> <!-- /container -->
    <script src="../src/vendors/jquery-1.9.1.min.js"></script>
    <script src="../src/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>