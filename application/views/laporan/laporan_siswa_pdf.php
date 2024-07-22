<!DOCTYPE html>
<html lang="en">

<head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>Laporan Siswa Ichthus International School</title>

   <!-- Custom fonts for this template-->
   <link href="<?= base_url('asset/'); ?>bs/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

   <!-- Custom styles for this template-->
   <link href="<?= base_url('asset/'); ?>bs/css/sb-admin-2.min.css" rel="stylesheet">
   
</head>
<body>
   <h3 class="text-dark text-bold"><center>DAFTAR SISWA ICHTHUS INTERNATIONAL SCHOOL</center></h3>
   <h3 class="text-dark text-bold"><center>Jl. Surya Mandala No.11 Kota Jakarta Barat 11520</center></h3>
   <hr size="2" color="black">
   <br>
<table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
   <thead>
      <tr >
         <th>No</th>
         <th>Nama</th>
         <th>NIS</th>
         <th>Email</th>
         <th>Jenis Kelamin</th>
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
            <td><?= $data['kelas']; ?></td>
            <td><?= $data['no_hp']; ?></td>
         </tr>
      </tbody>
      <?php
      endforeach ?>
</table>
<script type="text/javascript">
 window.print();
</script>
</body></html>