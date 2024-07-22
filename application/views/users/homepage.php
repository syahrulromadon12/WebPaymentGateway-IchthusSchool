<?= $this->session->userdata('nama_session');?>
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?= base_url('asset/image/ichtus-school-page-1.png')?>" class="d-block w-100 rounded" alt="..." style="height: 300px;">
    </div>
    <div class="carousel-item">
      <img src="<?= base_url('asset/image/ichthus-school-page-2.jpg')?>" class="d-block w-100 rounded" alt="..." style="height: 300px;">
    </div>
    <div class="carousel-item">
      <img src="<?= base_url('asset/image/ichthus-school-page-3.png')?>" class="d-block w-100 rounded" alt="..." style="height: 300px;">
    </div>
  </div>
</div>
<br>
<h4 class="fw-bold text-center">Kategori Pembayaran</h4>
<br>
<div class="row row-cols-2 justify-content-center ">
    <div class="col-md-2 rounded mb-5 mx-3 shadow-lg "  style="background: #8A3187;" onclick="window.location='<?php echo base_url('user/info_pembayaran')?>'">
      <div class="card-body  ">
      <img class="mx-5 mt-4 " src="<?= base_url('asset/icon/time-management.svg')?>" style=" width:5rem; justify-content:center;" alt="..." >
        <div class="card-title text-light mt-2">
          <p class="text-white text-center fw-bold">INFO PEMBAYARAN</p>
        </div>
      </div>
    </div>
    <div class="col-md-2 rounded mb-5 mx-3 shadow-lg" onclick="window.location='<?php echo base_url('user/bayar_tern')?>'" style="background: #8A3187;">
      <img class="mx-5 mt-4" src="<?= base_url('asset/icon/time-is-money.svg')?>" style=" width:5rem;" alt="..." >
      <div class="card-body  ">
        <div class="card-title text-light mt-2">
          <p class="text-white text-center fw-bold">BAYAR TERN</p>
        </div>
      </div>
    </div>
    <div class="col-md-2 rounded mb-5 mx-3 shadow-lg " onclick="window.location='<?php echo base_url('user/bayar_kegiatan')?>'" style="background: #8A3187;">
            <img class="mx-5 mt-4" src="<?= base_url('asset/icon/statutory.svg') ?>" style=" width:5rem;" alt="..." >
      <div class="card-body  ">
        <div class="card-title text-light mt-2">
          <p class="text-white text-center fw-bold">BAYAR KEGIATAN</p>
        </div>
      </div>
    </div>
    <div class="col-md-2 rounded mb-5 mx-3 shadow-lg" onclick="window.location='<?php echo base_url('user/riwayat_transaksi')?>'" style="background: #8A3187;">
            <img class="mx-5 mt-4" src="<?= base_url('asset/icon/transaction-history.svg')?>" style=" width:5rem;" alt="..." >
      <div class="card-body  ">
        <div class="card-title text-light mt-2">
          <p class="text-white text-center fw-bold">RIWAYAT TRANSAKSI</p>
        </div>
      </div>
    </div>
    <div class="col-md-2 rounded mb-5 mx-3 shadow-lg" onclick="window.location='<?php echo base_url('user/bayar_wisuda')?>'" style="background: #8A3187;">
            <img class="mx-5 mt-4" src="<?= base_url('asset/icon/graduation.svg')?>" style=" width:5rem;" alt="..." >
      <div class="card-body  ">
        <div class="card-title text-light mt-2">
          <p class="text-white text-center fw-bold">WISUDA</p>
        </div>
      </div>
    </div>
</div>
