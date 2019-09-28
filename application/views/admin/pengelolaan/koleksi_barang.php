<div class="box box-primary">
  <div class="box-header">
        <h3 class="box-title">Database Barang &nbsp;&nbsp;<a href="<?php echo base_url()."admin/pengelolaan/isibarang/"?>"
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
                    <th> ID barang</th>
                    <th> Nama jenis </th>
                    <th> Nama Barang</th>
                    <th>Spesifikasi</th>
                    <th>Merk </th>
                    <th>Tanggl input</th>
                    <th>SN</th>
                    <th>Foto barang</th>
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

                  <td><?php echo $row->idbarang;?></td>

                <td><?php echo $row->nmjenis;?></td>
                <td><?php echo $row->nmbarang;?></td>
                <td><?php echo $row->spesifikasi;?></td>
                <td><?php echo $row->nmmerk;?></td>
                  <td><?php echo $row->tgl_input;?></td>
                  <td><?php echo $row->sn;?></td>
                  <td><img src="<?php echo base_url()."assets/dist/img/".$row->fotobarang;?>" alt="" width='100px'></td>
                  <td>
                <a href="<?php echo base_url()."admin/pengelolaan/koleksi_barang/update/".$row->idbarang; ?>" class="btn btn-success btn-sm">Edit</a>
                      <a href="<?php echo base_url()."admin/pengelolaan/koleksi_barang/hapus/".$row->idbarang; ?>" class="btn btn-danger btn-sm">Delete</a>
              </td>
          </tr>
          <?php
      $no++;
      }
      ?>
</table>
</div>