<!DOCTYPE html>
<html lang="en">

<head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>admin</title>

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
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= $user['nama'] ?>
                                <img class="img-profile rounded-circle"
                                    src="<?= base_url('asset/profile'.$user['foto']) ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Outer Row -->
                  <div class="row justify-content-center">
                     <div class="col-xl-7 col-lg-10 col-md-9">
                        <div class="card o-hidden border-0 shadow-lg my-4">
                           <div class="card-body p-0">
                              <!-- Nested Row within Card Body -->
                              <div class="row">
                              <?= $this->session->flashdata('message') ?>
                                 <div class="col-lg-5 d-none d-lg-block bg-login-image"></div>
                                 <div class="col-lg-12">
                                    <div class="p-5">
                                       <!--form add user -->
                                       <div class="text-center">
                                          <h1 class="h4 text-gray-900 mb-4">Edit Siswa</h1>
                                       </div>

                                       <form action="<?= base_url('admin/update_siswa') ?>" method="POST" enctype="multipart/form-data">
                                          <div class="form-group">
                                             <input type="hidden" class="form-control form-control-user" name="id" id="id" aria-describedby="emailHelp" value="<?= $siswa['id'] ?>">
                                             <label class="text-dark" for="">Nama</label>
                                             <input type="text" class="form-control form-control-user" name="nama" id="nama" aria-describedby="emailHelp" value="<?= $siswa['nama'] ?>">
                                          </div>
                                          <div class="form-group">
                                          <label class="text-dark" for="">Nomor Induk Siswa</label>
                                             <input type="text" class="form-control form-control-user" name="nis" id="nis" value="<?= $siswa['nis'] ?>">
                                          </div>
                                          <div class="form-group">
                                          <label class="text-dark" for="">Email</label>
                                             <input type="text" class="form-control form-control-user" name="email" id="email" value="<?= $siswa['email'] ?>">
                                          </div>
                                          <div class="form-group">
                                             <input type="hidden" class="form-control form-control-user" name="password" id="password" value="<?= $siswa['password'] ?>">
                                          </div>
                                          <div class="form-group">
                                             <label class="text-dark" for="">Jenis Kelamin</label>
                                          <div class="form-check">
                                          <input class="form-check-input" type="radio" name="jns_kelamin" value="Laki-Laki" <?php if($siswa['jns_kelamin']=='Laki-Laki') echo 'checked'?> id="jns_kelamin">
                                             Laki-Laki                            
                                             &nbsp &nbsp &nbsp &nbsp
                                             <input class="form-check-input" type="radio" name="jns_kelamin" value="Perempuan" <?php if($siswa['jns_kelamin']=='Perempuan') echo 'checked'?> id="jns_kelamin">
                                             Perempuan
                                          </div>
                                             <div class="form-check">
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="text-dark" for="">Alamat</label>
                                             <input type="text" class="form-control form-control-user" name="alamat" id="example2" value="<?= $siswa['alamat'] ?>">
                                          </div>
                                          <div class="form-group">
                                             <label class="text-dark" for="">Tempat Lahir</label>
                                             <input type="text" class="form-control form-control-user" name="tmpt_lahir" id="example2" value="<?= $siswa['tmpt_lahir'] ?>">
                                          </div>
                                          <div class="form-group">
                                             <label class="text-dark" for="">Tanggal Lahir</label>
                                             <input type="date" class="form-control form-control-user" name="tgl_lahir" id="example2" value="<?= $siswa['tgl_lahir'] ?>">
                                          </div>
                                       
                                          <div class="form-group">
                                             <label class="text-dark" for="">Kelas</label>
                                             <div class="form-check">
                                             <select class="form-control" name="kelas"  id="kelas">
                                                <option value="<?=$siswa['kelas'];?>"><?php echo $siswa['kelas'];?></option>
                                                <option value="X SCIENCE?>">X SCIENCE</option>
                                                <option value="X SOCIAL">X SOCIAL</option>
                                                <option value="XI SCIENCE?>">XI SCIENCE</option>
                                                <option value="XI SOCIAL">XI SOCIAL</option>
                                                <option value="XII SCIENCE?>">XII SCIENCE</option>
                                                <option value="XII SOCIAL">XII SOCIAL</option>
                                             </select>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="text-dark" for="">Nomor hp</label>
                                             <input type="text" class="form-control form-control-user" name="no_hp" id="no_hp" value="<?= $siswa['no_hp'] ?>">
                                          </div>
                                          <div class="form-group">
                                             <label class="text-dark" for="foto">Foto</label>
                                             <div>
                                                   <img src="<?= base_url('asset/profile/' . $siswa['foto']) ?>" alt="Current Photo" class="img-thumbnail" width="150">
                                             </div>
                                             <input type="file" class="form-control form-control-user mt-2" name="foto" id="foto">
                                          </div>
                                          <button type="submit" class="btn btn-primary btn-user btn-block">
                                             Edit
                                          </button>
                                          <button type="cancel" class="btn btn-warning btn-user btn-block">
                                             Cancel
                                          </button>
                                       </form>
                                       <hr>
                                       <div class="text-center">
                                          <p>Document of Ichthus School</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
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

</body>

</html>