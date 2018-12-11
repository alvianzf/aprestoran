                    <div class="row-fluid" id="reserve">
                        <!-- block -->
                        <div class="block" >
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Daftar Pemesan</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    
                                      
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover table-condensed" id="example">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Pemesan</th>
                                                <th>Waktu Reservasi</th>
                                                <th>Jumlah Pesanan</th>
                                                <th>Total Tagihan</th>
                                                <th width="5%">Bayar</th>
                                                <th width="5%">Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        $a = mysql_query("SELECT DISTINCT id_user FROM tb_reservasi WHERE status='reserved' AND id_user>0");
                                        $total =0;
                                        $no=0;
                                        $total=0;
                                        
                                        while ($b = mysql_fetch_assoc($a)) {

                                            $c = mysql_query("SELECT * FROM tb_users WHERE id='".$b['id_user']."'");
                                            $d = mysql_fetch_assoc($c);
                                            $e = mysql_query("SELECT * FROM tb_pegawai WHERE id='".$d['pegawai_id']."'");
                                            $menu= mysql_fetch_assoc($e);
                                            $f = mysql_query("SELECT * FROM tb_reservasi WHERE id_user='".$b['id_user']."' AND status='reserved'");
                                            $g = mysql_num_rows($f);

                                            $cekom = mysql_query("SELECT SUM(subtotal) AS ttl FROM tb_reservasi WHERE id_user='".$b['id_user']."' AND status='reserved'");
                                            $cekin = mysql_fetch_assoc($cekom);

                                            $time = mysql_query("SELECT meja FROM tb_reservasi WHERE id_user='".$b['id_user']."' AND status='reserved'");
                                            $time1= mysql_fetch_assoc($time);

                                            $no=$no+1;

                                            ?>
                                            <tr>
                                            <a href="#"></a><td><?php echo $no; ?></td>
                                            <td><?php echo $menu['nama'];?></td>
                                            <td width="10%"><?php echo $time1['meja'];?></td>
                                            <td><?php echo $g;?> item</td>
                                            <td>Rp <strong><?php echo $cekin['ttl'];?></strong></td>
                                            <td><a href="home.php?page=finance&id=<?php echo $b['id_user'];?>" /> <button class="btn btn-info btn-block"><i class="icon-edit icon-white"></i> </button></a></td>
                                            <td><a href="home.php?page=delres&id=<?php echo $b['id_user'];?>" /> <button class="btn btn-danger btn-block"><i class="icon-trash icon-white"></button></a></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                   