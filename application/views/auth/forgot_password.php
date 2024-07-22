<div class="row mt-5 justify-content-center" >
   <div class="card  " style="width: 30rem;">
   <div class="card-header">
      <h4 class="text-center">Forgot Password</h4>
   </div>
   <div class="card-body">
      <h5 class="card-title text-center">Masukan Email</h5>
      <center><?= $this->session->flashdata('message') ?></center>
      <form action="<?= base_url('auth/forgotPassword'); ?>" method="POST">
         <div class="form-group">
            <input type="text" name="email" class="form-control "
            id="email" aria-describedby="nameHelp"
            placeholder="masukan email anda">
            <?= form_error('email','<div class"text-small text_danger">','</div>') ?>
         </div>
         <br>
         <div class="d-grid gap-2">
            <button class="btn btn-block btn-primary justify-content-end" type="submit">Reset Password</button>
            <a class="text-center small mt-3 mb-4" href="<?= base_url('auth') ?>">Back to Login</a>
         </div>
      </form>
   </div>
   </div>
</div>
</div>
