<?php
$id     = @$_GET['id'];
$query  = mysql_query("SELECT * FROM tb_makanan WHERE id = '$id'");
$edit   = mysql_fetch_assoc($query);
?>

                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Edit Menu Makanan</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">

                                    <form class="form-horizontal" method="post" action="controls/editmenu.php" enctype="multipart/form-data">
                                      <fieldset>
                                        <legend>Tambah Menu</legend>
                                        <div class="control-group">
                                          <label class="control-label" for="typeahead">Kode Makanan</label>
                                          <div class="controls"><h4><?php echo $edit['kode_makanan']; ?></h4></div>
                                          </div>
                                        <div class="control-group">
                                          <label class="control-label" for="typeahead">Nama Menu </label>
                                          <div class="controls">
                                            <input type="text" class="span6" id="typeahead" name="namamakanan" value="<?php echo $edit['nama_makanan']; ?>">
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="select01">Tipe Menu</label>
                                          <div class="controls">
                                            <select id="select01" class="chzn-select" name="tipemakanan">
                                              <option active><strong><?php echo $edit['jenis_makanan']; ?></strong></option>
                                              <option>Makanan</option>
                                              <option>Minuman</option>
                                              <option>Dessert</option>
                                              <option>Lain-lain</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="typeahead">Harga Menu </label>
                                          <div class="controls">
                                            <input type="number" value="<?php echo $edit['harga_makanan']; ?>" class="span6" id="typeahead" name="hargamakanan">
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="fileInput">Upload Gambar</label>
                                          <div class="controls">
                                            <input type="file" name="gambar">
                                          </div>
                                        </div>

                                        <div class="control-group">
                                          <label class="control-label" for="fileInput">Deskripsi Makanan</label>
                                          <div class="controls">
                                          	<textarea class="span6" name="deskripsi"><?php echo $edit['deskripsi']; ?></textarea>
                                          </div>
                                        </div>
                                        <div class="form-actions">
                                          <button type="submit" class="btn btn-primary" name="simpan" value="<?php echo $edit['kode_makanan'];?>">Simpan</button>
                                        </div>
                                      </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

