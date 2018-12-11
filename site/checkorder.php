                    <div class="row-fluid" id="reserve">
                        <!-- block -->
                        <div class="block" >
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Pesanan Saya</div>
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        $id = @$_GET['id'];

                                        $i  = @$_GET['i'];

                                        $a = mysql_query("SELECT * FROM tb_reservasi WHERE kode_faktur='".$i."' AND id_user='".$id."'");
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
                                            <td><?php echo $b['subtotal'];?></td></tr>
                                            <?php
                                            }

                                            $id = @$_GET['id'];
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                   