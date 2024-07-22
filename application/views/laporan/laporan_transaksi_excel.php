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
         <th>Order_ID</th>
         <th>Nama</th>
         <th>NIS</th>
         <th>Biaya</th>
         <th>Tipe Pembayaran</th>
         <th>Bank</th>
         <th>Waktu Transaksi</th>
         <th>Status Pembayaran</th>
      </tr>
   </thead>
      <?php
      $no = 1;
      //if (isset($data))
      foreach ((array)$transaksi as $data) : ?>
      <tbody>
         <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['order_id']; ?></td>
            <td><?= $data['nama']; ?></td>
            <td><?= $data['nis']; ?></td>
            <td><?= $data['gross_amount']; ?></td>
            <td><?= $data['payment_type']; ?></td>
            <td><?= $data['bank'] ?></td>
            <td><?= $data['transaction_time']; ?></td>
            <td><?php if ($data['status_code'] == '200'){
            ?>
            <label >sukses</label>
            <?php
            } else{
            ?>
            <label>pending</label>
            <?php
            }
            ?>
            </td>
         </tr>
      </tbody>
      <?php
      endforeach ?>
</table>
</body></html>