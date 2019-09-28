<div class="box box-primary">
  <div class="box-header">
        <h3 class="box-title">Tambah Data Sumber_barang</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/sumber_barang/sumber_br/simpan">
      <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Sumber barang</label>
                  <div class="col-sm-10">
                    <input type="text" name="nm_sumber" class="form-control" id="inputEmail3" placeholder="nama sumber">
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>admin/merk/merk" class="btn btn-danger btn-sm">Batal</a> &nbsp;&nbsp;
                <button type="submit" class="btn btn-info btn-sm">Simpan</button>
              </div>
              <!-- /.box-footer -->
    </form>
  </div>
</div>