<div class="box box-primary">
	<div class="box-header">
        <h3 class="box-title">Update Data kampus</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <?php foreach($barang as $b){ ?>
		<form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/kategori_barang/kategori/edit">
			<div class="box-body">
			    <input type="hidden" name="id_kategori" value="<?php echo $b->idkategori ?>">
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Nama kategori</label>
              <div class="col-sm-10">
                <input type="text" name="nama_kategori" class="form-control" id="inputPassword3" value="<?php echo $b->nmkategori; ?>">
              </div>
            </div>
          
            <div class="box-footer">
              <a href="<?php echo base_url();?>admin/kategori_barang/kategori" class="btn btn-danger btn-sm">Batal</a> &nbsp;&nbsp;
              <button type="submit" class="btn btn-info btn-sm">Update</button>
            </div>
            <!-- /.box-footer -->
          <?php } ?>
		</form>
	</div>
</div>