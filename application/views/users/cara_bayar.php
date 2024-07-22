<div class="card shadow-lg border-0" style="background:#E2D6E5;">
  <div class="card-text  mt-4 mb-4">
    <h5 class="text-center fw-bold">INFORMASI CARA PEMBAYARAN</h5>
    <br>
    <!-- Button trigger modal -->
  <h6 class="mx-4 fw-bold">Transfer Bank/Virtual Account</h6>
  <div type="button shadow-lg" class="btn btn-light mt-2 mx-4" style="" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    <img class="" src="<?= base_url('asset/icon/bca.svg') ?>" style="width:60px; height:45px;" alt="">
    <br>
  </div>
  <div type="button shadow-lg" class="btn btn-light mt-2 " style="" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    <img class="" src="<?= base_url('asset/icon/cimb.svg') ?>" style="width:60px; height:45px;" alt="">
    <br>
  </div>
  <div type="button shadow-lg" class="btn btn-light mt-2 mx-4" style="" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    <img class="" src="<?= base_url('asset/icon/bri.svg') ?>" style="width:60px; height:45px;" alt="">
    <br>
  </div>
  <div type="button shadow-lg" class="btn btn-light mt-2  " style="" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    <img class="" src="<?= base_url('asset/icon/bni.svg') ?>" style="width:60px; height:45px;" alt="">
    <br>
  </div>
  <div type="button shadow-lg" class="btn btn-light mt-2 mx-4" style="" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    <img class="" src="<?= base_url('asset/icon/mandiri.svg') ?>" style="width:60px; height:45px;" alt="">
    <br>
  </div>
  <hr>

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background:#E2D6E5;"  >
          <h1 class="modal-title fs-5" " id="staticBackdropLabel">Transfer Bank/Virtual Account</h1>
          <button shadow-lg type="button shadow-lg" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button shadow-lg>
        </div>
        <div class="modal-body text-justify">
        <h6>Melalui Mobile Banking</h6>
        <p>- Lakukan login ke mobile Banking yang</p> 
        <p>- Pada menu utama, pilih manu “Bayar” atau “transfer Bank”</p> 
        <p>- Pilih “input baru”</p> 
        <p>- Masukan nomor Virtual Account anda, lalu pilih”Benar”</p> 
        <p>- Konfirmasi transaksi dan masukan Password, lalu klik lanjut</p> 
        <p>- Transaksi anda akan di proses</p> 
        <hr>
        <h6>Melalui Transfer Bank</h6>
        <p>- Pada menu utama, pilih “Menu Lainnya” > “Transfer”</p> 
        <p>- Pilih ke “Rekening Tabungan” > “Rekening yang kamu pilih”</p> 
        <p>- Masukan nomor Virtual Account anda dan klik “Benar”</p> 
        <p>- Jumlah yang dibayarkan, nomor rekening dan nomor merchant &nbsp;&nbsp;akan di tampilkan. jika informasi telah sesuai, pilih “Ya”</p> 
        <p>- Transaksi anda telah selesai</p> 
        </div>
        <div class="modal-footer">
          <button shadow-lg type="button shadow-lg" class="btn btn-secondary" data-bs-dismiss="modal">Close</button shadow-lg>
        </div>
      </div>
    </div>
  </div>

  <h6 class="mx-4 fw-bold">Merchant</h6>
  <div type="button shadow-lg" class="btn btn-light mt-2 mx-4" style="" data-bs-toggle="modal" data-bs-target="#merchant">
    <img class="" src="<?= base_url('asset/icon/alfamart.svg') ?>" style="width:60px; height:45px;" alt="">
    <br>
  </div>
  <div type="button shadow-lg" class="btn btn-light mt-2 " style="" data-bs-toggle="modal" data-bs-target="#merchant">
    <img class="" src="<?= base_url('asset/icon/indomart.svg') ?>" style="width:60px; height:45px;" alt="">
    <br>
  </div>
  <hr>

  <!-- Modal -->
  <div class="modal fade" id="merchant"" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="merchant" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background:#E2D6E5;"  >
          <h1 class="modal-title fs-5" " id="staticBackdropLabel">Alfamart/Indomart</h1>
          <button shadow-lg type="button shadow-lg" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button shadow-lg>
        </div>
        <div class="modal-body">
        <h6>Melalui Alfamart/Indomart</h6>
        <p>- Login ke website pembayaran Biaya sekolah Ichthus School</p> 
        <p>- pilih menu biaya pembayaran yang diinginkan</p> 
        <p>- akan muncul informasi biaya yang harus di bayarkan, lalu klik &nbsp;&nbsp;“Bayar”</p> 
        <p>- Pilih metode pembayaran “Alfamart”/”Indomart” > “Bayar”</p> 
        <p>- Akan ditampilkan kode pembayaran</p> 
        <p>- Lalu datangi gerai Alfamart/Indomaret</p> 
        <p>- Tunjukan kode bayar ke kasir</p> 
        <p>- Lakukan pembayaran sesuai dengan harga yang tertera</p> 
        <p>- Kasir akan memberikan struk sebagai bukti pembayaran</p> 
        <p>- Transaksi anda telah selesai</p> 
        
        </div>
        <div class="modal-footer">
          <button shadow-lg type="button shadow-lg" class="btn btn-secondary" data-bs-dismiss="modal">Close</button shadow-lg>
        </div>
      </div>
    </div>
  </div>

  <h6 class="mx-4 fw-bold">E-Wallet</h6>
  <div type="button shadow-lg" class="btn btn-light px-auto mt-2 mx-4" style="" data-bs-toggle="modal" data-bs-target="#e-wallet">
    <img class="" src="<?= base_url('asset/icon/gopay.svg') ?>" style="width:60px; height:45px;" alt="">
    <br>
  </div>
  <div type="button shadow-lg" class="btn btn-light mt-2 " style="" data-bs-toggle="modal" data-bs-target="#e-wallet">
    <img class="" src="<?= base_url('asset/icon/ovo.svg') ?>" style="width:60px; height:45px;" alt="">
    <br>
  </div>
  <div type="button shadow-lg" class="btn btn-light mt-2 mx-4 " style="" data-bs-toggle="modal" data-bs-target="#e-wallet">
    <img class="" src="<?= base_url('asset/icon/dana.svg') ?>" style="width:60px; height:45px;" alt="">
    <br>
  </div>
  <div type="button shadow-lg" class="btn btn-light mt-2 " style="" data-bs-toggle="modal" data-bs-target="#e-wallet">
    <img class="" src="<?= base_url('asset/icon/spay.svg') ?>" style="width:60px; height:45px;" alt="">
    <br>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="e-wallet" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="e-wallet" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background:#E2D6E5;"  >
          <h1 class="modal-title fs-5" " id="staticBackdropLabel">E-Money</h1>
          <button shadow-lg type="button shadow-lg" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button shadow-lg>
        </div>
        <div class="modal-body">
        <h6>Melalui E-Money</h6>
        <p>- Login ke website pembayaran Biaya sekolah Ichthus School</p> 
        <p>- pilih menu biaya pembayaran yang diinginkan</p> 
        <p>- Akan muncul informasi biaya yang harus di bayarkan, lalu klik &nbsp;&nbsp;“Bayar”</p> 
        <p>- Pilih metode pembayaran “E-Wallet” > “Bayar”</p> 
        <p>- Akan tampil QRIS pembayaran</p> 
        <p>- Lalu buka aplikasi E-Wallet yang anda pilih</p> 
        <p>- kemudian pilih menu “Scan QRIS”  dan scan Qris anda</p> 
        <p>- Jumlah yang dibayarkan, nomor rekening dan nomor merchant &nbsp;&nbsp;akan di tampilkan. jika informasi telah sesuai, pilih “Bayar”</p> 
        <p>- Transaksi anda telah selesai</p> 
        
        </div>
        <div class="modal-footer">
          <button shadow-lg type="button shadow-lg" class="btn btn-secondary" data-bs-dismiss="modal">Close</button shadow-lg>
        </div>
      </div>
    </div>
  </div>

  </div>
</div>