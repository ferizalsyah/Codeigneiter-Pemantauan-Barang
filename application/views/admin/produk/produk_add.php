<div class="box box-primary">
  <div class="box-header">
        <h3 class="box-title">Tambah Data barang</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <form class="form-horizontal" method="post" action="<?php echo base_url();?>/admin/produk/produk/simpan" enctype='multipart/form-data'>
			<div class="box-body">
              <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Id produk </label>
                  <div class="col-sm-10">
                    <input type="id_produk" name="id_produk" class="form-control" id="inputPassword3">
                  </div>
                </div>
              <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nama Produk</label>

                  <div class="col-sm-10">
                    <input type="nama_produk" name="nama_produk" class="form-control" id="inputPassword3">
                  </div>
                </div>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Harga</label>
                  <div class="col-sm-10">
                  <input type="harga" name="harga" class="form-control" id="inputPassword3">
                  </div>
                </div>
                   
                <div class="form-group">
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Photo </label>

                  <div class="col-sm-10">
                    <input type="file" name="foto_1" class="form-control" id="inputPassword3" >
                  </div>
                </div>
                  <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Input </label>
                  <div class="col-sm-10">
                    <input type="Date" name="Tanggal_input" class="form-control" id="inputPassword3">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Jumlah Produk</label>

                  <div class="col-sm-10">
                    <input type="jumlah_produk" name="jumlah_produk" class="form-control" id="date-picker" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Deskripsi</label>

                  <div class="col-sm-10">
                    <input type="deskripsi" name="Deskripsi" class="form-control" id="date-picker" >
                  </div>
              <div class="box-footer">
                <a href="<?php echo base_url();?>admin/lokasi_ruang/ruang_lokasi" class="btn btn-danger btn-sm">Batal</a> &nbsp;&nbsp;
                <button type="submit" class="btn btn-info btn-sm">Tambah</button>
              </div>
              <!-- /.box-footer -->
          
        </form>
  </div>
</div>