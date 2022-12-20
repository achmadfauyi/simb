<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIMB | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(''); ?>/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url(''); ?>/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(''); ?>/adminlte/dist/css/adminlte.min.css">
  <link rel="icon" href="<?= base_url(''); ?>/newspaper.ico" type="image/gif">
</head>
<?php
$session = session();
$errors = $session->getFlashdata('errors');
$errors2 = $session->getFlashdata('errors2');
?>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="../../index2.html" class="h1"><b>SIMB</b></a>
      </div>
      <div class="card-body">
        <?php if ($errors != null) : ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php
            foreach ($errors as $err) {
              echo $err . '<br>';
            }
            ?>
          </div>
        <?php endif ?>
        <form action="<?= base_url(); ?>/Auth/login_akun" method="post" id="formlogin">
          <div class="input-group form-group mb-3">
            <input type="text" class="form-control" name="username" id="username" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="far fa-id-card"></span>
              </div>
            </div>
          </div>
          <input type="checkbox" onclick="myFunction()">&nbsp Show Password
          <div class="input-group form-group mb-3">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            <br>
            <script>
              function myFunction() {
                var x = document.getElementById("password");
                if (x.type === "password") {
                  x.type = "text";
                } else {
                  x.type = "password";
                }
              }
            </script>
          </div>
          <!-- /.col -->
          <div class="row">
            <div class="col-12">
              <button type="submit" id="valid" class="btn btn-primary btn-block">Log In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <br>
        <p class="mb-0">
          <a href="<?= base_url(); ?>/Auth/register" class="text-center">Buat akun baru</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?= base_url(''); ?>/adminlte/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url(''); ?>/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url(''); ?>/adminlte/dist/js/adminlte.min.js"></script>
  <!-- jquery-validation -->
  <script src="<?= base_url(''); ?>/adminlte/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="<?= base_url(''); ?>/adminlte/plugins/jquery-validation/additional-methods.min.js"></script>
  <script>
    $(function() {
      $('#formlogin').validate({
        rules: {
          username: {
            required: true,
          },
          password: {
            required: true,
          },
        },
        messages: {
          username: {
            required: "Username Wajib Diisi",
          },
          password: {
            required: "Password Wajib Diisi",
          },
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
  </script>
</body>

</html>