<div class="box box-primary">
	<div class="box-header">
        <h3 class="box-title">Update Data kampus</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <?php foreach($kampus as $b){ ?>
		<form class="form-horizontal" method="post" action="<?php echo base_url();?>/admin/kampus/kampus/update_simpan">
			<div class="box-body">
			    <input type="hidden" name="idkampus" value="<?php echo $b->idkampus ?>">
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kode kampus</label>
                  <div class="col-sm-10">
                    <input type="text" name="kode_kampus" class="form-control" id="inputPassword3" value="<?php echo $b->kd_kampus; ?>">
                  </div>
                </div>
          
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nama kampus</label>

                  <div class="col-sm-10">
                    <input type="text" name="nama_kampus" class="form-control" id="inputPassword3" value="<?php echo $b->nmkampus ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>

                  <div class="col-sm-10">
                    <textarea type="text" name="alamat_kampus" class="form-control" id="inputPassword3"><?php echo $b->alamat ?></textarea>
                  </div>
                </div>

              <div class="box-footer">
                <a href="<?php echo base_url();?>admin/kampus/kampus" class="btn btn-danger btn-sm">Batal</a> &nbsp;&nbsp;
                <button type="submit" class="btn btn-info btn-sm">Update</button>
              </div>
              <!-- /.box-footer -->
            <?php } ?>
		</form>
	</div>
</div>