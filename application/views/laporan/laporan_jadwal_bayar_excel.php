<!DOCTYPE html>
<html lang="en"><head>
   <title></title>
</head><body>
<?php
 header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename=$title.xls");
 header("Pragma: no-cache");
 header("Expires: 0");
 ?>
 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
   <thead>
      <tr>
         <th>No</th>
         <th>Nama Biaya</th>
         <th>Tgl Bayar</th>
         <th>Jumlah BAYAR</th>
         <th>Keterangan</th>
      </tr>
   </thead>
      <?php
      $no = 1;
      //if (isset($data))
      foreach ((array)$jadwal_bayar as $data) : ?>
      <tbody>
         <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['nama_biaya']; ?></td>
            <td><?= $data['tgl_bayar']; ?></td>
            <td><?= $data['harga']; ?></td>
            <td><?= $data['keterangan']; ?></td>
         </tr>
      </tbody>
      <?php
      endforeach ?>
</table>
 </body>
</html>