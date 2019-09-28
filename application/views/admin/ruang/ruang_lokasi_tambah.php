<div class="box box-primary">
  <div class="box-header">
        <h3 class="box-title">Tambah Data barang</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <form class="form-horizontal" method="post" action="<?php echo base_url();?>/admin/lokasi_ruang/ruang_lokasi/simpan">
			<div class="box-body">
            <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nama ruang</label>

                  <div class="col-sm-10">
                    <input type="text" name="nama_ruang" class="form-control" id="inputPassword3" >
                  </div>
                </div>
          
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">lantai Ruang </label>

                  <div class="col-sm-10">
                    <input type="number" name="lantai_ruang" class="form-control" id="inputPassword3">
                  </div>
                </div>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama kampus</label>
                  <div class="col-sm-10">
                    <select name='nama_kampus' id='jenis_barang' class='form-control'>
                     <!-- <option value=''>----Pilih kategori Barang----</option>"; -->
                     <?php  
                      foreach ($kt->result() as $row_kategori) {  ?>
                        <option value="<?php echo $row_kategori->idkampus; ?>"><?php echo $row_kategori->nmkampus; ?></option>;
                      <?php } ?>
                    
                    </select>
  
                  </div>
                </div>
              <div class="box-footer">
                <a href="<?php echo base_url();?>admin/lokasi_ruang/ruang_lokasi" class="btn btn-danger btn-sm">Batal</a> &nbsp;&nbsp;
                <button type="submit" class="btn btn-info btn-sm">Update</button>
              </div>
              <!-- /.box-footer -->
          
        </form>
  </div>
</div>