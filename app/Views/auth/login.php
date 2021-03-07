<?= $this->extend('temp/template'); ?>

<?= $this->section('content'); ?>
<div class="l1">
  <div class="back">
    <p>SIMAPRO</p>
  </div>
  <div class="container">
    <div class="content">
      <p class="title">Login</p>

      <form id="loginForm" action="<?= base_url() ?>/auth/authLogin" method='POST'>
        <input type="username" name="username" placeholder="Username" value="<?= old('username') ?>">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="submitLogin" value="Login" id="login">
      </form>
    </div>
  </div>
</div>
<script>
  const Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 2000,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

  <?php if (session()->getFlashdata('errlog') == 'username') { ?>
    Toast.fire({
      icon: 'error',
      title: 'Username is not available'
    })
  <?php } ?>

  <?php if (session()->getFlashdata('errlog') == 'password') { ?>
    Toast.fire({
      icon: 'error',
      title: 'Incorrect Password'
    })
  <?php } ?>
</script>
<?= $this->endSection(); ?>