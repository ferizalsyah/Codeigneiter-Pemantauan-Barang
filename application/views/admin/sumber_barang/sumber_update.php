<div class="box box-primary">
	<div class="box-header">
        <h3 class="box-title">Update Data kampus</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <?php foreach($barang as $b){ ?>
		<form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/sumber_barang/sumber_br/edit">
			<div class="box-body">
			    <input type="hidden" name="idsumber" value="<?php echo $b->idsumber ?>">
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Sumber barang</label>
              <div class="col-sm-10">
                <input type="text" name="nm_sumber" class="form-control" id="inputPassword3" value="<?php echo $b->nmsumber; ?>">
              </div>
            </div>
          
            <div class="box-footer">
              <a href="<?php echo base_url();?>admin/merk/merk" class="btn btn-danger btn-sm">Batal</a> &nbsp;&nbsp;
              <button type="submit" class="btn btn-info btn-sm">Update</button>
            </div>
            <!-- /.box-footer -->
          <?php } ?>
		</form>
	</div>
</div>