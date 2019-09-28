 <div class="box box-primary">
  <div class="box-header">
        <h3 class="box-title">Database Barang &nbsp;&nbsp;<a href="<?php echo base_url()."bpm/sdm/sdm/tambah/"?>"
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
                    <!-- <th>kd sdm</th> -->
                    <th>Nama sdm</th>
                    <th> nama profesi</th>
                    <th>alamat</th>
                    <th>Tempat Lahir</th>
                    <th>Tgl lahir</th>
                    <th>Foto</th>
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
                  <!-- <td><?php echo $row->kdsdm;?></td> -->
                  <td><?php echo $row->nmsdm;?></td>
                  <td><?php echo $row->nmprofesi;?></td>
                  <td><?php echo $row->alamat;?></td>
                  <td><?php echo $row->tmp_lahir; ?></td>
                  <td><?php echo $row->tgl_lahir; ?></td>
                  <td><img src="<?php echo base_url()."assets/dist/img/".$row->foto; ?>" alt="" width="75px" height='75px'></td>
                  <td>
                       <a href="<?php echo base_url()."bpm/sdm/sdm/update/".$row->idsdm; ?>" class="btn btn-success btn-sm">Edit</a>
                       <a href="<?php echo base_url()."bpm/sdm/sdm/hapus/".$row->idsdm; ?>" class="btn btn-danger btn-sm">Delete</a>
                       <a href="<?php echo base_url()."bpm/sdm/sdm/download/".$row->idsdm; ?>" class="btn btn-primary btn-sm">Unduh</a>
                  </td>
          </tr>
          <?php
      $no++;
      }
      ?>
</table>
</div>