<br>
<table class="table table-bordered text-center">
  <thead>
    <tr style="background:#8A3187;">
      <th scope="col">NO</th>
      <th scope="col">Nama Biaya</th>
      <th scope="col">Tanggal Pembayaran</th>
      <th scope="col">Harga</th>
      <th scope="col">Keterangan</th>
    </tr>
  </thead>
  <?php
    $no = 1;
    //if (isset($data))
    foreach ((array)$jadwal_bayar as $data) : ?>
    <tbody>
      <tr>
        <td scope="row"><?= $no++; ?></td>
        <td><?= $data['nama_biaya']; ?></td>
        <td><?= $data['tgl_bayar']; ?></td>
        <td>Rp.<?= $data['harga']; ?></td>
        <td><?= $data['keterangan']; ?></td>
      </tr>
    </tbody>
    <?php endforeach ?>
</table>