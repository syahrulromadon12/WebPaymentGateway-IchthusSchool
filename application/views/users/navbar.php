<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <div class="navbar-brand">
      <img src="<?= base_url('asset/') ?>icon/ich_school.svg" style="width:180px;">
    </div>
    <div class="collapse navbar-collapse text-bold justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0 text-bold">
        <li class="nav-item">
          <a class="nav-link fw-bold text-dark" href="<?= base_url('user') ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold text-dark" href="https://wa.me/085781605275">Admin Contact</a>
        </li>
      </ul>
      <ul class="navbar-nav mb-2 mb-lg-0 text-bold">
        <li class="nav-item dropdown">
          <a class="nav-link text-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $user['nama'] ?>
            <img src="<?= base_url('asset/profile/' . $user['foto']) ?>" class="img-fluid rounded-circle profile-img" alt="Profile Image">
          </a>
          <ul class="dropdown-menu">
            <a class="dropdown-item" href="<?= base_url('user/profile') ?>">Profile</a>
            <a class="dropdown-item text-danger" href="<?= base_url('auth/logout') ?>">Logout</a>
          </ul>
        </li>
      </ul>
      <!-- Nav Item - User Information -->
    </div>
  </div>
</nav>

<style>
  .profile-img {
    width: 2.5rem;
    height: 2.5rem;
    object-fit: cover;
  }
</style>
