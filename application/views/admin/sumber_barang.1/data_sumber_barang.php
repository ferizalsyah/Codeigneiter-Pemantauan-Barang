 <div class="box box-primary">
  <div class="box-header">
        <h3 class="box-title">Database Barang &nbsp;&nbsp;<a href="<?php echo base_url()."admin/data_barang/tambah/"?>"
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
                    <th>Id sumber</th>
                    <th>Nama Sumber</th>
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
                  <td><?php echo $row->idsumber;?></td>
                  <td><?php echo $row->nmsumber;?></td>
                  
                  
                  <td>
            <a href="<?php echo base_url()."admin/kampus/kampus/sumber_barang/update/".$row->idsumber; ?>" class="btn btn-success btn-sm">Edit</a>
                  <a href="<?php echo base_url()."admin/kampus/sumber_barang/hapus/".$row->nmsumber; ?>" class="btn btn-danger btn-sm">Delete</a>
          </td>
          </tr>
          <?php
      $no++;
      }
      ?>
</table>
</div>