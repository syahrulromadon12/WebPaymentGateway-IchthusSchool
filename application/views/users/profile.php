   <!-- <div class="row row-cols-2 justify-content-center">
      <!--<img class=" shadow-lg" src="<?= base_url('asset/profile/' . $user['foto']) ?>" style="width:25rem; height:25rem;" alt="">
      <div class="col-md-6 px-5 rounded mx-3 shadow-lg" style="background: #E2D6E5;">
         <table class="mt-5" >
            <tr>
               <td class="">Nama</td>
               <td class=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
               <td class=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
               <td class="">: <?= $user['nama']; ?></td>
            </tr>
            <tr>
               <td class="">NIS</td class="">
               <td class=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
               <td class=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
               <td class="">: <?= $user['nis']; ?></td>
            </tr>
            <tr>
               <td class="">Email</td class="">
               <td class=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
               <td class=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
               <td class="">: <?= $user['email'] ?></td>
            </tr>
            <tr>
               <td class="">Jenis Kelamin</td class="">
               <td class=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
               <td class=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
               <td class="">: <?= $user['jns_kelamin'] ?></td>
            </tr>
            <tr>
               <td class="">Alamat</td class="">
               <td class=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
               <td class=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
               <td class="">: <?= $user['alamat'] ?></td>
            </tr>
            <tr>
               <td class="">Tempat Lahir</td class="">
               <td class=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
               <td class=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
               <td class="">: <?= $user['tmpt_lahir'] ?></td>
            </tr>
            <tr>
               <td class="">Tanggal Lahir</td class="">
               <td class=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
               <td class=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
               <td class="">: <?= $user['tgl_lahir'] ?></td>
            </tr>
            <tr>
               <td class="">Kelas</td class="">
               <td class=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
               <td class=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
               <td class="">: <?= $user['kelas'] ?></td>
            </tr>
            <tr>
               <td class="">Nomor Hp</td class="">
               <td class=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
               <td class=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
               <td class="">: <?= $user['no_hp'] ?></td>
            </tr>
         </table>
      </div>
      <div class="card mt-5 border-0 shadow-lg pt-5 px-5 pb-5">
         <h5 class="text-dark text-center" for="">Ubah Password</h5>
         <center><?= $this->session->flashdata('message'); ?></center>
         <form action="<?= base_url('auth/ubah_password') ?> " method="POST">
            <div class="form-group">
               <la class="text-dark" for="">Password Lama</la bel>
               <input type="text" class="form-control form-control-user mb-3" name="password_lama" id="password_lama" placeholder="masukan password">
               <?= form_error('password_lama','<div class"text-small text_danger">','</div>') ?>
            </div>
            <div class="form-group">
               <label class="text-dark" for="">Password Baru</label>
               <input type="text" class="form-control form-control-user mb-3" name="password_baru" id="password_baru" placeholder="masukan password">
               <?= form_error('password_baru','<div class"text-small text_danger">','</div>') ?>
            </div>
            <button type="submit" class="btn btn-primary  btn-block mb-2">
               Upload
            </button>
            <button type="cancel" class="btn btn-warning  btn-block mb-2">
               Cancel
            </button>
         </form>
      </div>
   </div> -->

<style>
   .profile-container {
         display: flex;
         align-items: flex-start;
         padding: 40px;
         border: 1px solid #ddd;
         border-radius: 10px;
         max-width: 800px;
         margin: auto;
         background-color: #f9f9f9;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }
      .profile-photo {
         flex: 1;
         text-align: center;
      }
     .profile-photo img {
         border-radius: 2%;
         width: 154px;
         height: 210px;
         object-fit: cover;
      }
      .profile-details {
         flex: 2;
         padding-left: 20px;
      }
      .profile-details h2 {
         margin: 0;
         padding-bottom: 10px;
      }
      .profile-details p {
         margin: 5px 0;
      }
      .profile-details table {
         width: 100%;
         border-collapse: collapse;
      }
      .profile-details table tr {
         border-bottom: 1px solid #ddd;
      }
      .profile-details table tr:last-child {
         border-bottom: none;
      }
      .profile-details table td {
         padding: 8px;
         vertical-align: top;
      }
      .profile-details table td:first-child {
         font-weight: bold;
         width: 150px;
      }
      .profile-details table td:nth-child(2), .profile-details table td:nth-child(3) {
         width: 10px;
      }
      .profile-details table td:last-child {
         width: auto;
      }
      .card{
         padding: 20px;
         border: 1px solid #ddd;
         border-radius: 10px;
         max-width: 512px;
         background-color: #f9f9f9;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }
</style>
   <div class="profile-container px-5">
      <div class="profile-photo mt-4 me-3">
         <img src="<?= base_url('asset/profile/' . $user['foto']) ?>" alt="Pasfoto">
      </div>
      <div class="profile-details">
         <table class="mt-2">
            <tr>
               <td>Nama</td>
                    <td></td>
                    <td></td>
                    <td>: <?= $user['nama']; ?></td>
                </tr>
                <tr>
                    <td>NIS</td>
                    <td></td>
                    <td></td>
                    <td>: <?= $user['nis']; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td></td>
                    <td></td>
                    <td>: <?= $user['email']; ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td></td>
                    <td></td>
                    <td>: <?= $user['jns_kelamin']; ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td></td>
                    <td></td>
                    <td>: <?= $user['alamat']; ?></td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td></td>
                    <td></td>
                    <td>: <?= $user['tmpt_lahir']; ?></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td></td>
                    <td></td>
                    <td>: <?= $user['tgl_lahir']; ?></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td></td>
                    <td></td>
                    <td>: <?= $user['kelas']; ?></td>
                </tr>
                <tr>
                    <td>Nomor Hp</td>
                    <td></td>
                    <td></td>
                    <td>: <?= $user['no_hp']; ?></td>
                </tr>
            </table>
        </div>
    </div>
    <center><div class="card mt-5 border-0 shadow-lg pt-5 px-5 pb-5 max-width justify-content-center">
         <h5 class="text-dark text-center" for="">Ubah Password</h5>
         <center><?= $this->session->flashdata('message'); ?></center>
         <form action="<?= base_url('auth/ubah_password') ?> " method="POST">
            <div class="form-group mt-2">
               <input type="text" class="form-control form-control-user mb-3" name="password_lama" id="password_lama" placeholder="Masukan Password Lama">
               <?= form_error('password_lama','<div class"text-small text_danger">','</div>') ?>
            </div>
            <div class="form-group">
               <input type="text" class="form-control form-control-user mb-3" name="password_baru" id="password_baru" placeholder="Masukan Password Baru">
               <?= form_error('password_baru','<div class"text-small text_danger">','</div>') ?>
            </div>
            <button type="submit" class="btn btn-primary  btn-block mb-2">
               Ubah
            </button>
            <button type="cancel" class="btn btn-warning  btn-block mb-2">
               Cancel
            </button>
         </form>
      </div>