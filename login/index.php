<!DOCTYPE html>
<html>
  <head>
    <title>Admin Login</title>
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

      <form class="form-signin" method="post" action="../controls/verify.php">
        <h2 class="form-signin-heading">Login ke Sistem</h2>
        <input type="text" class="input-block-level" placeholder="User Name" name="username">
        <input type="password" class="input-block-level" placeholder="Password" name="password">
        <button class="btn btn-large btn-primary btn-block" type="submit" name="go" value="1">Masuk</button>
        <a href="../site/adduser.php"><label>Sign in</label></a>
      </form>

    </div> <!-- /container -->
    <script src="../src/vendors/jquery-1.9.1.min.js"></script>
    <script src="../src/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>