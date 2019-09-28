<div class="box box-primary">
  <div class="box-header">
        <h3 class="box-title">Tambah Data barang</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <form class="form-horizontal" method="post" action="<?php echo base_url();?>/admin/sdm/sdm/simpan" enctype='multipart/form-data'>
			<div class="box-body">
              <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kode Sdm </label>

                  <div class="col-sm-10">
                    <input type="nmsdm" name="kdsdm" class="form-control" id="inputPassword3">
                  </div>
                </div>
              <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">nama sdm </label>

                  <div class="col-sm-10">
                    <input type="nmsdm" name="nmsdm" class="form-control" id="inputPassword3">
                  </div>
                </div>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama profesi</label>
                  <div class="col-sm-10">
                    <select name='idprofesi' id='jenis_barang' class='form-control'>
                     <option value=''>----Pilih Nama kategori----</option>";
                     <?php  
                      foreach ($kt->result() as $row_kategori) {  ?>

                        <option value="<?php echo $row_kategori->idprofesi; ?>"><?php echo $row_kategori->nmprofesi; ?></option>;
                      <?php } ?>
                    
                    </select>
  
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">alamat </label>

                  <div class="col-sm-10">
                    <input type="nmsdm" name="alamat" class="form-control" id="inputPassword3">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tempat lahir</label>

                  <div class="col-sm-10">
                    <input type="text" name="tmp_lahir" class="form-control" id="date-picker" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tanggal lahir</label>

                  <div class="col-sm-10">
                    <input type="date" name="tgl_lahir" class="form-control" id="date-picker" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Photo </label>

                  <div class="col-sm-10">
                    <input type="file" name="foto" class="form-control" id="inputPassword3" >
                  </div>
                </div>
              <div class="box-footer">
                <a href="<?php echo base_url();?>admin/lokasi_ruang/ruang_lokasi" class="btn btn-danger btn-sm">Batal</a> &nbsp;&nbsp;
                <button type="submit" class="btn btn-info btn-sm">Tambah</button>
              </div>
              <!-- /.box-footer -->
          
        </form>
  </div>
</div>