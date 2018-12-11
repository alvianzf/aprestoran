<?php
session_start();

if ($_SESSION['id']==NULL)
{
    header("location:index.php");
}

include 'controls/config.php';
?>

<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title>Sistem Informasi Restoran</title>
        <!-- Bootstrap -->
        <link href="src/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="src/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="src/assets/styles.css" rel="stylesheet" media="screen">
        <link href="src/assets/DT_bootstrap.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="src/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">Admin Panel</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <?php echo $_SESSION['nama']; ?> <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="site/changepass.php?i=<?php echo $_SESSION['id'];?>">Ganti Password</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="?page=logout">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li <?php

                        if(@$_GET['page']=='main')
                        {
                            echo 'class="active"';
                        }

                        ?>>
                            <a href="?page=main"><i class="icon-chevron-right"></i> Dashboard</a>
                        </li>
                        <li <?php

                        if(@$_GET['page']=='menu')
                        {
                            echo 'class="active"';
                        }

                        ?>>
                            <a href="?page=menu"><i class="icon-chevron-right"></i> Menu</a>
                        </li>

                        <li <?php

                        if(@$_GET['page']=='order')
                        {
                            echo 'class="active"';
                        }

                        ?>>
                            <a href="?page=order"><i class="icon-chevron-right"></i> Order</a>
                        </li>

                        <?php
                        if($_SESSION['role']=="ad")
                        {
                            ?>

                        
                    </ul>

                    
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">

                        <li <?php

                        if(@$_GET['page']=='adduser')
                        {
                            echo 'class="active"';
                        }

                        ?>>
                            <a href="?page=adduser"><i class="icon-chevron-right"></i> Tambah User</a>
                        </li>


                        <li <?php

                        if(@$_GET['page']=='payment')
                        {
                            echo 'class="active"';
                        }

                        ?>>
                            <a href="?page=payment"><i class="icon-chevron-right"></i> Pembayaran</a>
                        </li>
                        <li <?php

                        if(@$_GET['page']=='kuitansi')
                        {
                            echo 'class="active"';
                        }

                        ?>>
                            <a href="?page=kuitansi"><i class="icon-chevron-right"></i> Laporan</a>
                        </li>
                        
                        <?php   
                        }
                        ?>
                    </ul>
                </div>
                
                <!--/span-->
                <div class="span9" id="content">

                <?php
                if(@$_GET['page'] == 'main' || @$_GET['page'] == ''  )
                {
                    include 'site/main.php';
                } else if(@$_GET['page'] == 'menu')
                {
                    include 'site/menu.php';
                } else if(@$_GET['page'] == 'finance')
                {
                    include 'site/keuangan.php';
                }
                 else if(@$_GET['page'] == 'tambahmenu')
                {
                    include 'site/tambahmenu.php';
                }
                 else if(@$_GET['page'] == 'order')
                {
                    include 'site/order.php';
                } else if(@$_GET['page'] == 'editmenu')
                {
                    include 'site/editmenu.php';
                } else if (@$_GET['page']=="payment")
                {
                    include 'site/paylist.php';
                } else if (@$_GET['page']=="vieworder")
                {
                    include 'site/check.php';
                } else if (@$_GET['page']=="delres")
                {
                    include 'controls/delres.php';
                } else if (@$_GET['page']=="kuitansi")
                {
                    include 'site/kuitansi.php';
                } else if (@$_GET['page']=="checkorder")
                {
                    include 'site/checkorder.php';
                } else if (@$_GET['page']=="adduser")
                {
                    include 'site/adduser.php';
                }
                else if (@$_GET['page']=="printkuitansi")
                {
                    header('location:controls/printkuitansi.php');
                } else if(@$_GET['page'] == 'logout')
                {
                    header("location:logout.php");
                }
                ?>
                    
                </div>
            </div>
            <hr>
            <footer>
                <p>&copy; Restaurant APP 2018</p>
            </footer>
        </div>
        <!--/.fluid-container-->
        <script src="src/vendors/jquery-1.9.1.min.js"></script>
        <script src="src/bootstrap/js/bootstrap.min.js"></script>
        <script src="src/vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="src/assets/scripts.js"></script>
        <script src="src/vendors/datatables/js/jquery.dataTables.min.js"></script>
        <script src="src/assets/DT_bootstrap.js"></script>
        <script>
        <script>
        $(function() {
            // Easy pie charts
            $('.chart').easyPieChart({animate: 1000});


        });
        </script>
    </body>

</html>