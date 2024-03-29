<div class="box box-primary">
	<div class="box-header">
        <h3 class="box-title">Update Data Barang</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <?php foreach($barang as $b){ ?>
		<form class="form-horizontal" method="post" action="<?php echo base_url();?>/bpm/sdm/sdm/edit" enctype="multipart/form-data">
			<div class="box-body">
			<input type="hidden" name="idsdm" value="<?php echo $b->idsdm ?>">
      <div class="form-group">
                  <div class="col-sm-10">
                    <input type="hidden" name="kdsdm" class="form-control" id="inputPassword3" value="<?php echo $b->kdsdm ?>">
                  </div>
                </div>
          
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">nama sdm </label>

                  <div class="col-sm-10">
                    <input type="text" name="nmsdm" class="form-control" id="inputPassword3" value="<?php echo $b->nmsdm ?>">
                  </div>
                </div>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">nama profesi</label>
                  <div class="col-sm-10">
                    <select name='idprofesi' id='jenis_barang' class='form-control'>
                     <!-- <option value=''>----Pilih kategori Barang----</option>"; -->
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
                    <textarea type="text" name="alamat" class="form-control" id="inputPassword3"><?php echo $b->alamat ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tempat lahir </label>

                  <div class="col-sm-10">
                    <input type="text" name="tempat_lahir" class="form-control" id="inputPassword3" value="<?php echo $b->tempat_lahir; ?>">
                  </div>
                </div>
                <div class="form-group date">
                    <label for="inputPassword3" class="col-sm-2 control-label">Tanggal lahir </label>
                    <div class="col-md-10">
                      <input type="date" class="form-control" name='tgl_lahir' id="datepicker" value="<?php echo $b->tgl_lahir; ?>">
                    </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Photo </label>

                  <div class="col-sm-10">
                    <input type="hidden" name="foto_old" class="form-control" id="inputPassword3" value="<?php echo $b->foto; ?>">
                    <input type="file" name="foto" class="form-control" id="inputPassword3">
                  </div>
                </div>
              <div class="box-footer">
                <a href="<?php echo base_url();?>bpm/sdm/sdm" class="btn btn-danger btn-sm">Batal</a> &nbsp;&nbsp;
                <button type="submit" class="btn btn-info btn-sm">Update</button>
              </div>

              <!-- /.box-footer -->
            <?php } ?>
		</form>
	</div>
</div>