<div class="box box-primary">
  <div class="box-header">
        <h3 class="box-title">Tambah Data barang</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <form class="form-horizontal" method="post" action="<?php echo base_url();?>/admin/kampus/kampus/add_data">
      <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kode kampus</label>

                  <div class="col-sm-10">
                    <input type="text" name="kode_kampus" class="form-control" id="inputEmail3" placeholder="Kode kampus">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama kampus</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama_kampus" class="form-control" id="inputEmail3" placeholder="Nama kampus">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Alamat kampus</label>
                  <div class="col-sm-10">
                    <textarea type="text" name="alamat_kampus" class="form-control" id="inputEmail3" placeholder="Alamat"></textarea>
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>admin/kampus/kampus" class="btn btn-danger btn-sm">Batal</a> &nbsp;&nbsp;
                <button type="submit" class="btn btn-info btn-sm">Simpan</button>
              </div>
              <!-- /.box-footer -->
    </form>
  </div>
</div>