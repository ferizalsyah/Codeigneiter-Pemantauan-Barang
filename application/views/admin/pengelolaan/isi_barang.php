<div class="box box-primary">
  <div class="box-header">
        <h3 class="box-title">Tambah Data barang</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <form class="form-horizontal" method="post" action="<?php echo base_url();?>/admin/pengelolaan/isibarang/add_data" enctype="multipart/form-data">
      <div class="box-body">

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"> Nama Barang</label>

                  <div class="col-sm-10">
                    <input type="text" name="nama_barang" class="form-control" id="inputEmail3" placeholder="nama_barang">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Merk</label>
                  <div class="col-sm-10">
                      <select name='merk' id='Merk' class='form-control'>
                        <option value=''>----Pilih Merk Barang----</option>";
                        <?php  
                          foreach ($merk->result() as $row_kategori) {  ?>
                            <option value="<?php echo $row_kategori->idmerk; ?>"><?php echo $row_kategori->nmmerk; ?></option>;
                        <?php } ?>
                      
                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama jenis</label>
                  <div class="col-sm-10">
                      <select name='jenis_barang' id='Merk' class='form-control'>
                      <option value=''>----Pilih Jenis Barang----</option>";
                      <?php  
                        foreach ($jenis->result() as $row_kategori) {  ?>
                          <option value="<?php echo $row_kategori->idjenis; ?>"><?php echo $row_kategori->nmjenis; ?></option>;
                        <?php } ?>
                      
                      </select>
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Spesifikasi</label>
                  <div class="col-sm-10">
                    <textarea type="text" name="spesifikasi" class="form-control" id="inputEmail3" placeholder="spesifikasi"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Sn</label>
                  <div class="col-sm-10">
                    <input type="text" name="sn" class="form-control" id="inputEmail3" placeholder="SN">
                  </div>
                </div>
              
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Date</label>
                  <div class="col-sm-10">
                    <input type="Date" name="date" class="form-control" id="inputEmail3" placeholder="date">
                </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Foto Barang</label>
                  <div class="col-sm-10">
                    <input type="file" name="photo" class="form-control" id="inputEmail3">
                </div>
                </div>

              <!-- /.box-body -->
        
              <div class="box-footer">
                <a href="<?php echo base_url();?>admin/pengelolaan/koleksi_barang" class="btn btn-danger btn-sm">Batal</a> &nbsp;&nbsp;
                <button type="submit" class="btn btn-info btn-sm">Simpan</button>
              </div>
                        </div>
              <!-- /.box-footer -->
    </form>
  </div>
</div>