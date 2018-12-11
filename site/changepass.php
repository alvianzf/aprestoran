<?php

include '../controls/config.php';

$i    = @$_GET['i'];
$pass = mysql_fetch_assoc(mysql_query("SELECT * FROM tb_users WHERE id= '$i'"));

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Ganti Password</title>
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
    <div class="container">

    <form class="form-signin" method="post" action="../controls/changepass.php?i=<?php echo $i;?>" />
        <h4 class="form-signin-heading">Masukkan Password Baru</h4>
        <input type="password" class="input-block-level" value="<?php echo $pass['password'];?>" placeholder="Password" name="password">
        <button class="btn btn-large btn-primary btn-block" type="submit" name="go" value="1">Ganti Password</button>
      </form>

    </div> <!-- /container -->
    <script src="../src/vendors/jquery-1.9.1.min.js"></script>
    <script src="../src/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>