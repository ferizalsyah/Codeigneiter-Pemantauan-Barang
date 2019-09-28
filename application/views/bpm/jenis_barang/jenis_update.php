<div class="box box-primary">
	<div class="box-header">
        <h3 class="box-title">Update Data Barang</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <?php foreach($barang as $b){ ?>
		<form class="form-horizontal" method="post" action="<?php echo base_url();?>/bpm/jenis_barang/jenis/edit">
			<div class="box-body">
			<input type="hidden" name="id_barang" value="<?php echo $b->idjenis ?>">
      <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kode Jenis</label>

                  <div class="col-sm-10">
                    <input type="text" name="id_jenis" class="form-control" id="inputPassword3" value="<?php echo $b->idjenis ?>" readonly>
                  </div>
                </div>
          
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nama jenis</label>

                  <div class="col-sm-10">
                    <input type="text" name="nama_jenis" class="form-control" id="inputPassword3" value="<?php echo $b->nmjenis ?>">
                  </div>
                </div>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jenis Barang</label>
                  <div class="col-sm-10">
                    <select name='jenis_barang' id='jenis_barang' class='form-control'>
                     <!-- <option value=''>----Pilih kategori Barang----</option>"; -->
                     <?php  
                      foreach ($kt->result() as $row_kategori) {  ?>
                        <option value="<?php echo $row_kategori->idkategori; ?>"><?php echo $row_kategori->nmkategori; ?></option>;
                      <?php } ?>
                    
                    </select>
  
                  </div>
                </div>
              <div class="box-footer">
                <a href="<?php echo base_url();?>bpm/jenis_barang/jenis" class="btn btn-danger btn-sm">Batal</a> &nbsp;&nbsp;
                <button type="submit" class="btn btn-info btn-sm">Update</button>
              </div>
              <!-- /.box-footer -->
            <?php } ?>
		</form>
	</div>
</div>