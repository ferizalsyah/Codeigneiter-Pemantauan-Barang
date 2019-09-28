<div class="box box-primary">
  <div class="box-header">
        <h3 class="box-title">Tambah Data barang</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/jenis_barang/jenis/simpan">
      <div class="box-body">
        <div class="form-group">
 
            <div class="col-sm-10">
            <input type="hidden" name="kode_kampus" class="form-control" id="inputEmail3" placeholder="Kode Jenis">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Nama Jenis</label>
            <div class="col-sm-10">
            <input type="text" name="nama_jenis" class="form-control" id="inputEmail3" placeholder="Nama jenis">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Jenis Kategori</label>
            <div class="col-sm-10">
            <select name='jenis_kategori' id='jenis_kategori' class='form-control'>
                <!-- <option value=''>----Pilih kategori Barang----</option>"; -->
                <?php  
                foreach ($kt->result() as $row_kategori) {  ?>
                <option value="<?php echo $row_kategori->idkategori; ?>"><?php echo $row_kategori->nmkategori; ?></option>;
                <?php } ?>
            
            </select>

            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        <a href="<?php echo base_url();?>admin/jenis_barang/jenis" class="btn btn-danger btn-sm">Batal</a> &nbsp;&nbsp;
        <button type="submit" class="btn btn-info btn-sm">Simpan</button>
        </div>
        <!-- /.box-footer -->
    </form>
  </div>
</div>