<div class="row-fluid">
                        <div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h4>Selamat Datang!</h4>
                        	Selamat Datang, <strong> <?php echo $_SESSION['nama']. ", ".$_SESSION['posisi'];?> </strong> Restoran!</div>
                        	
                    	</div>


                    <div class="row-fluid">
                        <!-- block -->
                                <?php 

                                if ($_SESSION['role']=='ad') {
                                    # code...
                                
                                ?>
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Data Pengguna</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">

                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover table-condensed" id="example">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Nomor Kontak</th>
                                                <th>Alamat</th>
                                                <th width="5%">Aksi</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no=1;
                                        $ini = mysql_query("SELECT * FROM tb_pegawai WHERE posisi != 'Manajer'");

                                        while ($data = mysql_fetch_assoc($ini)) {
                                            # code...

                                            $user = mysql_fetch_assoc(mysql_query("SELECT * FROM tb_users WHERE pegawai_id = '".$data['id']."'"));
                                        ?>
                                        <tr>
                                        <td><?php echo $no;?></td>
                                        <td><?php echo $data['nama'];?></td>
                                        <td><?php echo $user['username'];?></td>
                                        <td><?php echo $user['password'];?></td>
                                        <td><?php echo $data['kontak'];?></td>
                                        <td><?php echo $data['alamat'];?></td>
                                        <td><a href="controls/deluser.php?i=<?php echo $user['id'];?>&q=<?php echo $data['id'];?>">
                                        <button class="btn btn-warning"><i class="icon-trash icon-white"></i></button></a></td>
                                        </tr>

                                        <?php 

                                        $no=$no+1;
                                            }
                                        ?>


                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                                    <?php
                                    }

                                    ?>
                    </div>


                   