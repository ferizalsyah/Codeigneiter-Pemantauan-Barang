<div class="box box-primary">
	<div class="box-header">
        <h3 class="box-title">Update Data kategori</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <?php foreach($barang as $b){ ?>
		<form class="form-horizontal" method="post" action="<?php echo base_url();?>/admin/kategori/kategori/edit" enctype='multipart/form-data'>
			<div class="box-body">
			<input type="hidden" name="id_nomor" value="<?php echo $b->id_nomor ?>">
      <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">title</label>
                  <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" id="inputPassword3" value="<?php echo $b->title ?>">
                  </div>
                </div>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">kategori</label>
                  <div class="col-sm-10">
                    <select name='idprofesi' id='jenis_barang' class='form-control'>
                     <!-- <option value=''>----Pilih kategori Barang----</option>"; -->
                     <?php  
                      foreach ($kt->result() as $row_kategori) {  ?>
                        <option value="<?php echo $row_kategori->id_nomor; ?>"><?php echo $row_kategori->id_nomor; ?></option>;
                      <?php } ?>
                    
                    </select>
  
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Photo </label>
                  <div class="col-sm-10">
                    <input type="file" name="foto">
                    <input type="hidden" name="foto_old" class="form-control-file" id="inputPassword3" value="<?php echo $b->foto ?>">
                  </div>
                </div>
              <div class="box-footer">
                <a href="<?php echo base_url();?>admin/kategori/kategori" class="btn btn-danger btn-sm">Batal</a> &nbsp;&nbsp;
                <button type="submit" class="btn btn-info btn-sm">Update</button>
              </div>
              <!-- /.box-footer -->
            <?php } ?>
		</form>
	</div>
</div>