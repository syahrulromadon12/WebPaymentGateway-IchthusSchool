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
         <th>Nama</th>
         <th>NIS</th>
         <th>Email</th>
         <th>Jenis Kelamin</th>
         <th>Alamat</th>
         <th>Tempat tgl lahir</th>
         <th>Kelas</th>
         <th>No Hp</th>
      </tr>
   </thead>
      <?php
      $no = 1;
      //if (isset($data))
      foreach ((array)$siswa as $data) : ?>
      <tbody>
         <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['nama']; ?></td>
            <td><?= $data['nis']; ?></td>
            <td><?= $data['email']; ?></td>
            <td><?= $data['jns_kelamin']; ?></td>
            <td><?= $data['alamat']; ?></td>
            <td><?= $data['tmpt_lahir'] ?>&nbsp;<?= $data['tgl_lahir'] ?></td>
            <td><?= $data['kelas']; ?></td>
            <td><?= $data['no_hp']; ?></td>
         </tr>
      </tbody>
      <?php
      endforeach ?>
</table>
</body></html>