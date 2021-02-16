<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <!-- Font -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
  <!-- CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/css/style.css">
  <!-- Sweet Alerts 2 -->
  <script src="<?= base_url() ?>/dist/sweetalert2.all.min.js"></script>

  <title>SIMAPRO</title>
</head>

<body>
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
          <input type="submit" name="" value="Login" id="login">
        </form>
      </div>
    </div>
  </div>
</body>
<script>
  const login = document.getElementById('login');
  login.addEventListener('click', function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 1000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })

    Toast.fire({
      icon: 'success',
      title: 'Signed in successfully'
    })
  });
</script>

</html>