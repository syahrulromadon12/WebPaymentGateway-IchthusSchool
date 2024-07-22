<!DOCTYPE html>
<html lang="en">

<head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>Login Page</title>

   <!-- Custom fonts for this template-->
   <link href="<?= base_url('asset/'); ?>bs/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

   <!-- Custom styles for this template-->
   <link href="<?= base_url('asset/'); ?>bs/css/sb-admin-2.min.css" rel="stylesheet">
   
</head>

<body class="" style="background: linear-gradient(251.34deg, rgba(80, 18, 81, 0.86) 10.33%, rgba(53, 9, 54, 0.86) 69.19%, rgba(28, 0, 31, 0.8256) 95.97%);">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row ">
                            <div class="col-lg-6 d-none d-lg-block " style="background:#8A3187">
                                <div class="justify-content-center">
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <img src="asset/icon/image 3.svg" style="width: 408px; position: center; ">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="asset/icon/ich_school.svg" style="width: 208px;">
                                        <?= $this->session->flashdata('message') ?>
                                        <br>
                                        <br>
                                        <br>
                                    </div>
                                    <form action="<?= base_url('auth'); ?>" method="POST">
                                        <div class="form-group">
                                            <input type="text" name="nis" class="form-control "
                                                id="exampleInputName" aria-describedby="nameHelp"
                                                placeholder="Nomor Induk siswa">
                                            <?= form_error('nis','<div class"text-small text_danger">','</div>') ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control "
                                                id="exampleInputPassword" placeholder="Password">
                                            <?= form_error('password','<div class"text-small text_danger">','</div>') ?>
                                        </div>
                                        <div class="text-center">
                                            <p class="small" >Masukan Password yang telah diberikan oleh pihak sekolah</p>
                                        </div>
                                        <br>
                                        <button class="btn btn-block" style="background: #F8F3A7; color:black;"  type="submit">Login</button>
                                        <hr>
                                        
                                    </form>
                                    
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('auth/forgotPassword') ?>">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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