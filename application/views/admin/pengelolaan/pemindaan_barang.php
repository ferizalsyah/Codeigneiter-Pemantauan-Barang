  <div class="box box-primary">
  <div class="box-header">
        <h3 class="box-title">Database Barang &nbsp;&nbsp;<a href="<?php echo base_url()."admin/lokasi_ruang/ruang_lokasi/tambah/"?>"
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
                    <th> id Detail </th>
                    <th> Barcode </th>
                    <th> Nama ruang</th>
                    <th> Nama Sdm </th>
                    <th> Kondisi </th>
                    <th>Tgl input</th>
                  </tr>
                </thead>
                <tbody>
               <?php 
               $no = 1;
                foreach ($data->result() as $row) {
              ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row->iddetail;?></td>
                  <td><?php echo $row->barcode;?></td>
                  <td><?php echo $row->idruang;?></td>
                  <td><?php echo $row->idsdm?></td>
                  <td><?php echo $row->idkondisi?></td>
                  <td><?php echo $row->tglinput;?></td>
                  
                  <td>
            <a href="<?php echo base_url()."admin/lokasi_ruang/ruang_lokasi/update/".$row->idruang; ?>" class="btn btn-success btn-sm">Edit</a>
                  <a href="<?php echo base_url()."admin/lokasi_ruang/ruang_lokasi/hapus/".$row->idruang; ?>" class="btn btn-danger btn-sm">Delete</a>
          </td>
          </tr>
          <?php
      $no++;
      }
      ?>
</table>
</div>