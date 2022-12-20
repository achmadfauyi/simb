<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIMB | Register</title>

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
$success = $session->getFlashdata('success');
$errors = $session->getFlashdata('errors');
?>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="../../index2.html" class="h1"><b>SIMB</b></a>
      </div>
      <div class="card-body">
        <form action="<?= base_url(); ?>/Auth/register_akun" method="post" id="formregister">
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
          <input type="checkbox" onclick="myFunction2()">&nbsp Show Password
          <div class="input-group form-group mb-3">
            <input type="password" class="form-control" name="repeatPassword" id="repeatPassword" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            <br>
            <script>
              function myFunction2() {
                var x = document.getElementById("repeatPassword");
                if (x.type === "repeatPassword") {
                  x.type = "text";
                } else {
                  x.type = "repeatPassword";
                }
              }
            </script>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <a href="<?= base_url(); ?>/Auth" class="text-center">Sudah punya akun?</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

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

      $('#formregister').validate({
        rules: {
          username: {
            required: true,
            minlength: 5,
            maxlength: 15,
            username: true,
            remote: {
              url: "<?= base_url(); ?>/Auth/cekUsername",
              type: "post",
              data: {
                username: function() {
                  return $('#username').val();
                }
              }
            }
          },
          password: {
            required: true,
            minlength: 8,
          },
          repeatPassword: {
            required: true,
            equalTo: "#password"
          },
        },
        messages: {
          username: {
            required: "Username Wajib Diisi",
            minlength: "Username Minimal 5 Karakter",
            maxlength: "Username Maximal 15 Karakter",
            username: "Username Hanya Boleh Huruf dan Angka",
            remote: jQuery.validator.format("{0} Sudah Pernah Dipakai"),
          },
          password: {
            required: "Password Wajib Diisi",
            minlength: "Password Minimal 8 Karakter",
          },
          repeatPassword: {
            required: "Password Wajib Diisi",
            equalTo: "Password Tidak Sama",
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
    jQuery.validator.addMethod("username", function(value, element) {
      return this.optional(element) || /^[a-zA-Z0-9_]+$/.test(value);
    });
  </script>
</body>

</html>