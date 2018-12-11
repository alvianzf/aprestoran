                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Menu Makanan</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                                                <?php if($_SESSION['role']=='ad'){ ?>
                                                                   <div class="table-toolbar">
                                                                      <div class="btn-group">
                                                                         <a href="?page=tambahmenu"><button class="btn btn-success">Tambah Menu <i class="icon-plus icon-white"></i></button></a>
                                                                      </div>
                                                                 </div>
                                                                 <?php     }?>
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="example2">
                                        <thead>
                                            <tr>
                                                <th>Kode Menu</th>
                                                <th>Nama Makanan</th>
                                                <th>Jenis Makanan</th>
                                                <th>Harga Satuan</th>
                                                <th>Gambar Makanan</th>
                                                <th>Deskripsi</th>
                                               <?php if($_SESSION['role']=='ad'){ ?> <th>Aksi</th><?php }?>
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
                                            <td><?php echo '<a href="'.$makan['pic'].'" target="_blank"> <img src="'.$makan['pic'].'" width="100"> </a>';?></td>
                                            <td><?php echo $makan['deskripsi'];?></td>
    <?php if($_SESSION['role']=='ad'){ ?>   <td width="6%"><a href="controls/hapus.php?id=<?php echo $makan['id'];?>"><i class="icon-trash"></i></a>
                                            <a href="?page=editmenu&id=<?php echo $makan['id'];?>"><i class="icon-edit"></i></a> </td> <?php }?>    

                                        <?php
                                        }

                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                   