                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Order</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">                                    
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="example2">
                                        <thead>
                                            <tr>
                                                <th>Kode Menu</th>
                                                <th>Nama Makanan</th>
                                                <th>Jenis Makanan</th>
                                                <th>Harga Satuan</th>
                                                <th>Jumlah</th>
                                                <th>Deskripsi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $check = mysql_query("SELECT * FROM tb_makanan");
                                        
                                        while ($makan = mysql_fetch_assoc($check)) {
                                        ?>

                                        <tr>
                                            <td><?php echo $makan['kode_makanan'];?></td>
                                            <td><?php echo $makan['nama_makanan'];?></td>
                                            <td><?php echo $makan['jenis_makanan'];?></td>
                                            <td><?php echo $makan['harga_makanan'];?></td>
                                            <form method="post" action="controls/tambah.php?i=<?php echo $makan['id'];?>&q=<?php echo $_SESSION['id'];?>">
                                            <td width="8%"><input class="span12" type="number" name="qty"></td>
                                            <td><?php echo $makan['deskripsi'];?></td>
                                            <td width="13%"><button class="btn btn-success btn-block" type="submit">Tambah <i class="icon-plus icon-white"></i></button></td>
                                            </form>

                                        <?php
                                        }

                                        ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>


                   <div class="row-fluid" id="reserve">
                        <!-- block -->
                        <div class="block" >
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Daftar Pesanan</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">

                                <?php
                                    $disabling = mysql_num_rows(mysql_query("SELECT * FROM tb_reservasi WHERE id_user='".$_SESSION['id']."' AND status='reserved'"));
                                                   
                                        if ($disabling<1) {
                                                        # code...
                                            $pesan1 = "disabled";
                                            $class1 = "secondary";
                                        } else{
                                            $pesan1 = "";
                                            $class1 = "warning";
                                   }
                                ?>

                                <div class="table-toolbar">
                                    <div class="btn-group">
                                    <a href="?page=vieworder"><button class="btn btn-<?php echo $class1;?>" <?php echo $pesan1;?> /><i class="icon-list icon-white"></i> Lihat Pesanan Saya</button></a>
                                    </div>
                                </div>
                                    
                                      
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Kode Menu</th>
                                                <th>Nama Makanan</th>
                                                <th>Jenis Makanan</th>
                                                <th width="10%">Harga Satuan</th>
                                                <th>Jumlah</th>
                                                <th>Subtotal</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        $a = mysql_query("SELECT * FROM tb_reservasi WHERE status='waiting' AND id_user='".$_SESSION['id']."' ORDER BY 'id' DESC");
                                        $total =0;
                                        $no=0;
                                        
                                        while ($b = mysql_fetch_assoc($a)) {

                                            $c = mysql_query("SELECT * FROM tb_makanan WHERE id='".$b['id_makanan']."'");
                                            $menu = mysql_fetch_assoc($c);
                                            $total = $total + $b['subtotal'];
                                            $no = $no+1;

                                            ?>
                                            <tr>
                                            <td><?php echo $no; ?></td>    
                                            <td><?php echo $menu['kode_makanan'];?></td>
                                            <td><?php echo $menu['nama_makanan'];?></td>
                                            <td><?php echo $menu['jenis_makanan'];?></td>
                                            <td><?php echo $menu['harga_makanan'];?></td>
                                            <td><?php echo $b['qty'];?></td>
                                            <td><?php echo $b['subtotal'];?></td>
                                            <td><a href="controls/hapuspesan.php?i=<?php echo $b['id'];?>"><i class="icon-trash"></i></a> </td>
                                            </tr>
                                            <?php
                                            }

                                            ?>
                                        </tbody>
                                    </table>
                                    <table class="table table-hover table-condensed">
                                        
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <form method="post" action="controls/reserve.php?i=<?php echo $_SESSION['id'];?>">
                                                <td width="18%"><strong>Waktu Reservasi</strong></td>
                                                <td width="18%">
                                                   <select id="select01" class="chzn-select span12" name="meja">
                                                   <?php

                                                    $today = date("Y-m-d");

                                                    $t = mysql_query("SELECT DISTINCT meja FROM tb_reservasi WHERE status='reserved' ");
                                                    while ($time = mysql_fetch_assoc($t)) {
                                                        # code...

                                                        $times = $time['meja'];
                                                        $cek   = mysql_query("SELECT * FROM tb_reservasi WHERE meja='".$times."' AND (tanggal=NULL OR tanggal='".$today."')");
                                                        $jlh   = mysql_num_rows($cek);

                                                        if ($jlh<=21) {
                                                            # code...
                                                            echo '<option>'.$times.'</option>';
                                                            $num=$num+1;
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <th width="30%"><p align="right">Total</p></th>
                                                <td width="30%"><p align="center"> <strong>Rp. <?php echo $total;?></strong></p></td>

                                                <?php
                                                $disabler = mysql_num_rows(mysql_query("SELECT * FROM tb_reservasi WHERE id_user='".$_SESSION['id']."' AND status='waiting'"));
                                                    
                                                    if ($disabler<1) {
                                                        # code...
                                                        $pesan = "disabled";
                                                        $class = "secondary";
                                                    } else{
                                                        $pesan    = "";
                                                        $class = "primary";
                                                    }
                                                           ?>
                                                <td width="10%"><button class="btn btn-<?php echo $class;?> btn-bloc" name="reserve" <?php echo $pesan;?> />Pesan</button></td>
                                                </form>
                                            </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>