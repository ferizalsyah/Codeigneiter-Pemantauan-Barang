<div class="box box-primary">
	<div class="box-header">
        <h3 class="box-title">Update Data Barang</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <?php foreach($barang as $b){ ?>
		<form class="form-horizontal" method="post" action="<?php echo base_url();?>/admin/produk/produk/edit" enctype='multipart/form-data'>
			<div class="box-body">
		  	<input type="hidden" name="id_produk" value="<?php echo $b->id_produk ?>">
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Nama Produk</label>
              <div class="col-sm-10">
                <input type="nama_produk" name="nama_produk" class="form-control" id="inputPassword3" value="<?php echo $b->nama_produk ?>">
              </div>
          </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Harga </label>

                  <div class="col-sm-10">
                    <input type="harga" name="harga" class="form-control" id="inputPassword3" value="<?php echo $b->harga ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Photo </label> 
                  <div class="col-sm-10">
                    <input type="file" name="foto">
                    <input type="hidden" name="foto_1" class="form-control-file" id="inputPassword3" value="<?php echo $b->foto_1 ?>">
                  </div>
                </div>
              <!--  
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Input</label>
                  <input type="tanggal_input
                  " name="tanggal_input" class="form-control" id="inputPassword3" value=" <?php echo $b->tanggal_input ?>">
                  </div>
                  -->
                  <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Input </label>
                  <div class="col-sm-10">
                    <input type="Date" name="Tanggal_input" class="form-control" id="inputPassword3" value="<?php echo $b->tanggal_input?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Jumlah Produk </label>
                  <div class="col-sm-10">
                    <input type="jumlah_produk" name="jumlah_produk" class="form-control" id="inputPassword3" value="<?php echo $b->jumlah_produk ?>">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Deskripsi</label>
                  <div class="col-sm-10">
                  <input type="deskripsi" name="deskripsi" class="form-control" id="date-picker" value="<?php echo $b->deskripsi ?>" >
                  </div>
                </div>
              <div class="box-footer">
                <a href="<?php echo base_url();?>admin/sdm/sdm" class="btn btn-danger btn-sm">Batal</a> &nbsp;&nbsp;
                <button type="submit" class="btn btn-info btn-sm">Update</button>
              </div>
              <!-- /.box-footer -->
            <?php } ?>
		</form>
	</div>
</div>