<?= $this->extend('temp/template'); ?>

<?= $this->section('content'); ?>
<div class="l1">
  <div class="back">
    <p>SIMAPRO</p>
  </div>
  <div class="container">
    <div class="content">
      <p class="title">Login</p>

      <form action="<?= base_url() ?>/home/dashboard" method='POST'>
        <input type="username" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="" value="Login">
      </form>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>