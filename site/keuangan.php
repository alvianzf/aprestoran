                    <div class="row-fluid" id="reserve">
                        <!-- block -->
                        <div class="block" >
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Daftar Pemesan</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    
                                      
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
                                                <th width="7%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        $error = @$_GET['error'];

                                        if ($error == 'true')
                                        {
                                            ?>

                                            <script>
                                                alert('Jumlah yang dimasukkan kurang dari jumlah bayar! \nSilahkan periksa kembali inputan anda.');
                                            </script>
                                            <?php
                                        }

                                        $id = @$_GET['id'];

                                        $a = mysql_query("SELECT * FROM tb_reservasi WHERE status='reserved' AND id_user='".$id."'");
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
                                            <td><a href="controls/hapusfinal.php?i=<?php echo $b['id'];?>"><button class="btn btn-danger"><i class="icon-trash icon-white"></i></button></a> </td>
                                            </tr>
                                            <?php
                                            }

                                            $id = @$_GET['id'];
                                            ?>
                                        </tbody>
                                    </table>
                                    <table class="table table-hover table-condensed">
                                        
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <form method="post" action="controls/bayar.php?i=<?php echo $id;?>&total=<?php echo $total;?>">
                                                <th><p align="right">Total yang harus dibayarkan</p></th>
                                                <td><p align="center"> <strong><font color="#047fea"><?php echo $total;?></font> </strong></p></td>
                                                <td><strong></strong></td>
                                                <th><p align="right">Uang yang diterima</p></th>
                                                <td><input class="span12" type="number" name="bayar"></td>
                                                <td><button class="btn btn-primary btn-block" name="reserve">Bayar</button></td>
                                                </form>
                                            </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                   