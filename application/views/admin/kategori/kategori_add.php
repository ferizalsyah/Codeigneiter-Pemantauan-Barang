<div class="box box-primary">
  <div class="box-header">
        <h3 class="box-title">Tambah Data kategori</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <form class="form-horizontal" method="post" action="<?php echo base_url();?>/admin/kategori/kategori/simpan" enctype='multipart/form-data'>
			<div class="box-body">
              <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">id Nomor </label>

                  <div class="col-sm-10">
                    <input type="nmsdm" name="nmsdm" class="form-control" id="inputPassword3">
                  </div>
                </div>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>
                  <div class="col-sm-10">
                    <select name='idprofesi' id='jenis_barang' class='form-control'>
                     <option value=''>----Pilih Nama kategori----</option>";
                     <?php  
                      foreach ($kt->result() as $row_kategori) {  ?>

                        <option value="<?php echo $row_kategori->kategori; ?>"><?php echo $row_kategori->kategori; ?></option>;
                      <?php } ?>
                    
                    </select>
  
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Title </label>

                  <div class="col-sm-10">
                    <input type="title" name="alamat" class="form-control" id="inputPassword3">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Photo </label>

                  <div class="col-sm-10">
                    <input type="file" name="foto" class="form-control" id="inputPassword3" >
                  </div>
                </div>
              <div class="box-footer">
                <a href="<?php echo base_url();?>admin/kategori/kategori" class="btn btn-danger btn-sm">Batal</a> &nbsp;&nbsp;
                <button type="submit" class="btn btn-info btn-sm">Tambah</button>
              </div>
              <!-- /.box-footer -->
          
        </form>
  </div>
</div>