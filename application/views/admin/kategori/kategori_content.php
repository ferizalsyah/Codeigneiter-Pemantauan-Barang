<div class="box box-primary">
  <div class="box-header">
        <h3 class="box-title">Database Barang &nbsp;&nbsp;<a href="<?php echo base_url()."admin/kategori/kategori/tambah/"?>"
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
                    <th>Id Nomor</th>
                    <th>Title</th>
                    <th>Foto</th>
                  </tr>
                </thead>
                <tbody>
               <?php 
               $no = 1;
                foreach ($data->result() as $row) {
                ?>
                <tr>
                  <td><?php echo $row->id_nomor; ?></td>
                  <td><?php echo $row->title ?></td>
                  <td><?php echo $row->foto   ?></td>
                  <td><img src="<?php echo base_url()."assets/dist/img/".$row->foto ?>" width='150px'/></td>
                  <td>
                  <a href="<?php echo base_url()."admin/kategori/kategori/update/".$row->id_nomor; ?>" class="btn btn-success btn-sm">Edit</a>
                  <a href="<?php echo base_url()."admin/kategori/kategori/hapus/".$row->id_nomor; ?>" class="btn btn-danger btn-sm">Delete</a>
                </tr>
              </td>
          <?php
          $no++;
          }
          ?>
</table>
</div>