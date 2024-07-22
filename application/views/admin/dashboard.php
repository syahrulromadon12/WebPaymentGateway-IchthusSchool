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
              <!-- < $user['name']; ?>
              < base_url('asset/img/') . $user['profile']; ?> -->
              <!-- Begin Page Content -->
              <div class="container-fluid">
                 <!-- Page Heading -->
                 <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                 </div>
                 <!-- Content Row -->
                 <div class="row">
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                       <div class="card border-left-primary shadow h-100 py-2">
                          <div class="card-body">
                             <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                   <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                      Jumlah Siswa</div>
                                   <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_siswa; ?> siswa</div>
                                </div>
                                <div class="col-auto">
                                   <i class="fas fa-user fa-2x text-gray-300"></i>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                       <div class="card border-left-info shadow h-100 py-2">
                          <div class="card-body">
                             <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                   <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                      Saldo Biaya Sekolah</div>
                                   <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= number_format($saldo) ?></div>
                                </div>
                                <div class="col-auto">
                                   <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                       <div class="card border-left-success shadow h-100 py-2">
                          <div class="card-body">
                             <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                   <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Success Payment
                                   </div>
                                   <div class="row no-gutters align-items-center">
                                      <div class="col mr-2">
                                         <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= $success_payment ?> Transaksi</div>
                                      </div>
                                      <div class="col-auto">
                                         <i class="fas fa-calender-check fa-2x text-gray-300"></i>
                                      </div>
                                   </div>
                                </div>
                                <div class="col-auto">
                                   <i class="fas fa-payment fa-2x text-gray-300"></i>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                       <div class="card border-left-warning shadow h-100 py-2">
                          <div class="card-body">
                             <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                   <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Payment
                                   </div>
                                   <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= $pending_payment ?> Transaksi</div>
                                </div>
                                <div class="col-auto">
                                   <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>

                    <div class="row">

                    <!-- Diagram Transaksi -->
                    <div class="col-lg-8 mb-4 ms-2"> <!-- Adjusted to 8 columns (65%) -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Diagram Transaksi</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="transactionChart"></canvas>
                                </div>
                                <hr>
                                <div class="text-center small">
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-primary"></i> Success
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-warning"></i> Pending
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-danger"></i> Failed
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Diagram Lingkaran Presentase Siswa yang Sudah Bayar dan Belum Bayar -->
                    <div class="col-lg-4 mb-4">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Presentase Siswa yang Sudah Bayar dan Belum Bayar</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-pie-container text-center"> <!-- Added text-center class for centering -->
                                    <canvas id="paymentStatusChart" style="max-width: 100%; height: auto;"></canvas> <!-- Added style for responsive chart -->
                                </div>
                                <div class="mt-4 text-center small">
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-success"></i> Sudah Bayar
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-warning"></i> Belum Bayar
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>

                 </div>
                 <!-- Content Row -->
              </div>
              <!-- /.container-fluid -->
           </div>
           <!-- End of Main Content -->
           <!-- Footer -->
           <footer class="sticky-footer bg-white">
              <div class="container my-auto">
                 <div class="text-center my-auto">
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    <script src="<?= base_url('asset/'); ?>bs/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('asset/'); ?>bs/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('asset/'); ?>bs/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('asset/'); ?>bs/js/sb-admin-2.min.js"></script>
    <!-- Page level custom scripts -->
    <script>
        // Data diagram transaksi (dummy data untuk contoh)
        var transactionData = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: 'Success',
                data: [<?= implode(',', $transaction_success) ?>],
                backgroundColor: 'rgba(78, 115, 223, 0.5)',
                borderColor: 'rgba(78, 115, 223, 1)',
                borderWidth: 1
            }, {
                label: 'Pending',
                data: [<?= implode(',', $transaction_pending) ?>],
                backgroundColor: 'rgba(255, 193, 7, 0.5)',
                borderColor: 'rgba(255, 193, 7, 1)',
                borderWidth: 1
            }, {
                label: 'Failed',
                data: [<?= implode(',', $transaction_failed) ?>],
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        };

        // Konfigurasi diagram transaksi
        var transactionConfig = {
            type: 'bar',
            data: transactionData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Monthly Transaction Overview'
                    }
                }
            },
        };

        // Menggambar diagram transaksi
        var transactionChart = new Chart(document.getElementById('transactionChart'), transactionConfig);

        // Data presentase siswa yang sudah bayar dan belum bayar (dummy data untuk contoh)
        var paymentStatusData = {
            datasets: [{
                data: [<?= $percentage_paid ?>, <?= $percentage_unpaid ?>],
                backgroundColor: ['#1cc88a', '#f6c23e'],
                hoverBackgroundColor: ['#17a673', '#e0ac2d'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
            labels: ['Sudah Bayar', 'Belum Bayar']
        };

        // Konfigurasi diagram lingkaran
        var paymentStatusConfig = {
            type: 'doughnut',
            data: paymentStatusData,
            options: {
                maintainAspectRatio: true,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: true
                },
                cutoutPercentage: 80,
            },
        };

        // Menggambar diagram lingkaran
        var paymentStatusChart = new Chart(document.getElementById('paymentStatusChart'), paymentStatusConfig);
    </script>
</body>
</html>
