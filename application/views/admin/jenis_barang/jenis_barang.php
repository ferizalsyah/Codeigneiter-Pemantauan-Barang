 <div class="box box-primary">
  <div class="box-header">
        <h3 class="box-title">Database Barang &nbsp;&nbsp;<a href="<?php echo base_url()."admin/jenis_barang/jenis/tambah/"?>"
        class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</a></h3>
    </div>
 <!-- Main content -->
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Id jenis</th>
                    <th>Nama jenis</th>
                    <th>Nama kategori</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
               <?php 
               $no = 1;
              foreach ($data->result() as $row) {
              ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row->idjenis;?></td>
                  <td><?php echo $row->nmjenis;?></td>
                  <td><?php echo $row->nmkategori;?></td>
                  
                  <td>
            <a href="<?php echo base_url()."admin/jenis_barang/jenis/update/".$row->idjenis; ?>" class="btn btn-success btn-sm">Edit</a>
                  <a href="<?php echo base_url()."admin/jenis_barang/jenis/hapus/".$row->idjenis; ?>" class="btn btn-danger btn-sm">Delete</a>
          </td>
          </tr>
          <?php
      $no++;
      }
      ?>
</table>
</div>