<br>
<table class="table table-bordered text-center">
  <thead>
    <tr style="background:#8A3187;">
      <th scope="col">NO</th>
      <th scope="col">Order ID</th>
      <th scope="col">Nama Biaya</th>
      <th scope="col">Jumlah Biaya</th>
      <th scope="col">Tipe Pembayaran</th>
      <th scope="col">waktu transaksi</th>
      <th scope="col">Bank</th>
      <th scope="col">Status Pembayaran</th>
      <th scope="col">Aksi</th>
   </tr>
  </thead>
  <?php
    $no = 1;
    //if (isset($data))
    foreach ((array)$transaksi as $data) : ?>
    <tbody>
      <tr>
        <td scope="row"><?= $no++; ?></td>
        <td><?= $data['order_id']; ?></td>
        <td><?= $data['nama_biaya']; ?></td>
        <td>Rp.<?= $data['gross_amount']; ?></td>
        <td><?= $data['payment_type']; ?></td>
        <td><?= $data['transaction_time']; ?></td>
        <td><?= $data['bank']; ?></td>
        <td><?php if ($data['status_code'] == '200'){
         ?>
            <label for="" class="badge bg-success text-light"><h6>success</h6></label>
         <?php
         } else{
         ?>
            <label for="" class="badge bg-warning text-light"><h6>pending</h6></label>
         <?php
         }
         ?>
         </td>
         <td><a class="btn btn-primary" href="<?= $data['bank']; ?>" target="_blank">Download</a></td>
      </tr>
    </tbody>
    <?php endforeach ?>
</table>