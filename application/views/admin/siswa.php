<!DOCTYPE html>
<html lang="en">

<head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">

   <title><?= $title; ?></title>

   <!-- Custom fonts for this template-->
   <link href="<?= base_url('asset/'); ?>bs/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

   <!-- Custom styles for this template-->
   <link href="<?= base_url('asset/'); ?>bs/css/sb-admin-2.min.css" rel="stylesheet">
   
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

   <!-- Sidebar - Brand -->
   <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-15">
      </div>
      <div class="sidebar-brand-text mx-3">Ichthus School</div>
   </a>

   <!-- Divider -->
   <hr class="sidebar-divider">

   <!-- Heading -->
   <div class="sidebar-heading">
      Administrator
   </div>

   <!-- Nav Item - Dashboard -->
   <li class="nav-item">
      <a class="nav-link" href="<?= base_url('admin') ?>">
         <span>Dashboard</span></a>
   </li>

   <!-- Divider -->
   <hr class="sidebar-divider">

   <!-- Heading -->
   <div class="sidebar-heading">
      Master
   </div>

   <!-- Nav Item - Charts -->
   <li class="nav-item">
      <a class="nav-link" href="<?= base_url()?>admin/siswa">
         <span>Daftar Siswa</span></a>
   </li>


   <li class="nav-item">
      <a class="nav-link" href="<?= base_url()?>admin/biaya">
         <span>Daftar Biaya</span></a>
   </li>

   <li class="nav-item">
      <a class="nav-link" href="<?= base_url()?>admin/riwayat_trans">
         <span>Riwayat transaksi</span></a>
   </li>

   <li class="nav-item">
      <a class="nav-link" href="<?= base_url()?>admin/jadwal_bayar">
         <span>Jadwal Bayar</span></a>
   </li>
   
   <hr class="sidebar-divider">

   <!-- Heading -->
   <div class="sidebar-heading">
      PEMBAYARAN
   </div>

   <!-- Nav Item - Charts -->
   <li class="nav-item">
      <a class="nav-link" href="<?= base_url()?>admin/sudah_bayar">
         <span>Sudah Bayar</span></a>
   </li>

   <!-- Nav Item - Charts -->
   <li class="nav-item">
      <a class="nav-link" href="<?= base_url()?>admin/belum_bayar">
         <span>Belum Bayar</span></a>
   </li>

   <hr class="sidebar-divider">

   <li class="nav-item">
      <a class="nav-link" href="<?= base_url()?>auth/logout">
         <span>LOGOUT</span></a>
   </li>

   <!-- Divider -->
   <hr class="sidebar-divider d-none d-md-block">



   <!-- Sidebar Toggler (Sidebar) -->
   <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
   </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

   <!-- Main Content -->
   <div id="content">

      <!-- Topbar -->
      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

         <!-- Sidebar Toggle (Topbar) -->
         <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
         </button>

         <!-- Topbar Navbar -->
         <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
               <ul class="navbar-nav mb-2 mb-lg-0 text-bold">
                  <li class="nav-item dropdown">
                  <a class="nav-link text-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     <?= $user['nama'] ?>
                     <img src="<?= base_url('asset/profile/default.jpg') ?>" class="" style="width:2.5rem; height:2.5rem; border-radius: 50px;"></img>
                  </a>
                  <ul class="dropdown-menu">
                     <a class="dropdown-item" href="<?= base_url('user/profile')?>">Profile</a>
                     <a class="dropdown-item text-danger" href="<?= base_url('auth/logout')?>">Logout</a>
                  </ul>
                  </li>
               </ul>
            </li>
         </ul>

      </nav>

      <!-- Begin Page Content -->
      <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800 ">Daftar Siswa</h1>

      <div class="mb-3">
         <a href="<?= base_url('auth/add_user') ?>" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
               <i class="fas fa-user"></i>
            </span>
            <span class="text">Tambah Siswa</span>
         </a>
      </div>

      <div class="mb-3">
         <a href="<?= base_url('admin/excel_siswa') ?>" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
               <i class="fas fa-download"></i>
            </span>
            <span class="text">Export Excel</span>
         </a>
         <a href="<?= base_url('admin/pdf_siswa') ?>" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
               <i class="fas fa-download"></i>
            </span>
            <span class="text">Export Pdf</span>
         </a>
      </div>

      <center><?= $this->session->flashdata('message'); ?></center>
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Siswa Ichthus School</h6>
        <form method="get" action="<?= base_url('admin/siswa'); ?>" class="form-inline">
         <label class="mx-2" for="">Pilih Kelas</label>
               <select name="kelas" onchange="this.form.submit()">
                  <option value="all" <?= $this->input->get('kelas') == 'all' ? 'selected' : ''; ?>>Semua Kelas</option>
                  <option value="x social" <?= $this->input->get('kelas') == 'x social' ? 'selected' : ''; ?>>X Social</option>
                  <option value="x science" <?= $this->input->get('kelas') == 'x science' ? 'selected' : ''; ?>>X Science</option>
                  <option value="xi social" <?= $this->input->get('kelas') == 'xi social' ? 'selected' : ''; ?>>XI Social</option>
                  <option value="xi science" <?= $this->input->get('kelas') == 'xi science' ? 'selected' : ''; ?>>XI Science</option>
                  <option value="xii social" <?= $this->input->get('kelas') == 'xii social' ? 'selected' : ''; ?>>XII Social</option>
                  <option value="xii science" <?= $this->input->get('kelas') == 'xii science' ? 'selected' : ''; ?>>XII Science</option>
               </select>
            </form>
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>NIS</th>
                        <th>Email</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Tempat tgl lahir</th>
                        <th>Kelas</th>
                        <th>No Hp</th>
                        <th>Aksi</th>
                     </tr>
                  </thead>
                  <?php
                  $no = $this->uri->segment(3) + 1;
                  foreach ($siswa as $data) : ?>
                     <tbody>
                        <tr>
                           <td><?= $no++; ?></td>
                           <td><img src="<?= base_url('asset/profile/'.$data['foto'])?>" style="width:5rem; " alt=""></td>
                           <td><?= $data['nama']; ?></td>
                           <td><?= $data['nis']; ?></td>
                           <td><?= $data['email']; ?></td>
                           <td><?= $data['jns_kelamin']; ?></td>
                           <td><?= $data['alamat']; ?></td>
                           <td><?= $data['tmpt_lahir'] ?>&nbsp;<?= $data['tgl_lahir'] ?></td>
                           <td><?= $data['kelas']; ?></td>
                           <td><?= $data['no_hp']; ?></td>
                           <td>
                              <a href="<?= base_url('admin/edit_siswa/' . $data['id']) ?>" class="btn btn-primary">Edit</a>
                              <a href="<?= base_url('admin/delete_siswa/' . $data['id']) ?>" class="btn btn-danger">Delet</a>
                           </td>
                        </tr>
                     </tbody>
                  <?php
                  endforeach ?>
               </table>
            </div>
         </div>
      </div>

      <!-- Pagination -->
      <div class="pagination-links">
         <?= $this->pagination->create_links(); ?>
      </div>

   </div>
   <!-- /.container-fluid -->

   <!-- Footer -->
   <footer class="sticky-footer bg-white">
      <div class="container my-auto">
         <div class="copyright text-center my-auto">
            <span>Copyright &copy; Ichthus School 2023</span>
         </div>
      </div>
   </footer>
            <!-- End of Footer -->

      </div>
        <!-- End of Content Wrapper -->

   </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script>
      function filterKelas() {
         var kelas = document.getElementById('filterKelas').value;
         window.location.href = "<?= base_url('admin/siswa?kelas=') ?>" + kelas;
      }
   </script>

</body>

</html>
