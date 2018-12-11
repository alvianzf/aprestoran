                    <div class="row-fluid" id="reserve">
                        <!-- block -->
                        <div class="block" >
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Laporan Keuangan</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    
                                      
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover table-condensed" id="example">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nomor Resi</th>
                                                <th>Pemesan</th>
                                                <th>Tanggal Pemesanan</th>
                                                <th>Jumlah Pesanan</th>
                                                <th>Total Tagihan</th>
                                                <th width="10%">Kuitansi</th>
                                        </thead>
                                        <tbody>
                                        <?php

                                        $a = mysql_query("SELECT DISTINCT kode_faktur FROM tb_penjualan");
                                        $no =0;
                                        
                                        while ($b = mysql_fetch_assoc($a)) {

                                            $ab = mysql_fetch_assoc(mysql_query("SELECT id_user FROM tb_penjualan WHERE kode_faktur='".$b['kode_faktur']."'"));
                                            $na = mysql_fetch_assoc(mysql_query("SELECT * FROM tb_pegawai WHERE id='".$ab['id_user']."'"));
                                            $ma = $na['nama'];
                                            $sisa = mysql_fetch_assoc(mysql_query("SELECT * FROM tb_penjualan WHERE kode_faktur='".$b['kode_faktur']."'"));
                                            $jum  = mysql_num_rows(mysql_query("SELECT qty FROM tb_reservasi WHERE kode_faktur='".$b['kode_faktur']."'"));
                                            $tgl  = mysql_fetch_assoc(mysql_query("SELECT tanggal FROM tb_reservasi WHERE kode_faktur='".$b['kode_faktur']."' "));

                                            $ini = date("d/m/Y", strtotime($tgl['tanggal']));
                                            
                                            $no=$no+1;
                                            ?>
                                            <tr>
                                            <a href="#"></a><td><?php echo $no; ?></td>
                                            <td>
                                            <a href="?page=checkorder&id=<?php echo $ab['id_user'];?>&i=<?php echo $b['kode_faktur'];?>">
                                            <?php echo $b['kode_faktur'];?></a>
                                            </td>
                                            <td><?php echo $ma;?></td>
                                            <td><?php echo $ini;?></td>
                                            <td><?php echo $jum; ?></td>
                                            <td><?php echo $sisa['total_bayar'];?></td>
                                            <td><a href="controls/printkuitansi.php?i=<?php echo $b['kode_faktur'];?>" /><button class="btn btn-info btn-block">
                                            <i class="icon-print icon-white"></i> </button></a></td>
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


                    <div class="row-fluid" id="reserve">
                        <!-- block -->
                        <div class="block" >
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Cetak Laporan</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    
                                <table class="table table-condensed">
                                    <th width="20%">
                                        <div class="pull-right">
                                            <span>Cetak Laporan untuk Bulan:</span>
                                        </div>
                                    </th>
                                    <th width="20%"><div class="controls">
                                            <select id="bulan" class="chzn-select span12">
                                                <?php                                                    
                                                    $bulan = mysql_query("SELECT DISTINCT monthname(tanggal) AS 'bulan', year(tanggal) AS 'tahun' FROM tb_penjualan");

                                                    while ($bulanan = mysql_fetch_assoc($bulan)) {
                                                        # code...

                                                        echo '<option value="'.$bulanan['bulan'].'">'.$bulanan['bulan'].' '.$bulanan['tahun'].'</option>';
                                                        ?>

                                                        <input type="hidden" id="tahun" value="<?php echo $bulanan['tahun'];?>">

                                                        <?php

                                                    }
                                                ?>
                                    </th width="20%">
                                            <th><button onclick="checkUang()" class="btn btn-primary btn-block"><i class="icon-print icon-white"></i> Laporan Keuangan</button>
                                            <button onclick="checkReserve()" class="btn btn-info btn-block"><i class="icon-ok icon-white"></i> Laporan Pemesanan</button>
                                            <button onclick="checkPengguna()" class="btn btn-secondary btn-block"><i class="icon-user "></i> Laporan Pengguna</button></th>
                                    <th width="30%"></th>
                                </table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


<script type="text/javascript">
    var c = document.getElementById('bulan');
    var d = document.getElementById('tahun');

    function checkUang()
    {
        if (!c.value)
        {
            alert('Silahkan pilih bulan!');
        }else{
            window.location.href= "controls/lapkeuangan.php?i="+c.value+"&q="+d.value;
        }
    }

    function checkPengguna()
    {        
        window.location.href= "controls/lapuser.php";
    }

    function checkReserve()
    {
        if (!c.value)
        {
            alert('Silahkan pilih bulan!');
        }else{
            window.location.href= "controls/lapreserve.php?i="+c.value+"&q="+d.value;
        }
    }
</script>