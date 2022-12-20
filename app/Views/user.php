<?= $this->extend('layout/layout'); ?>
<?= $this->section('content'); ?>
<?php
$session = session();
$errors = $session->getFlashdata('errors');
?>
<!-- Default box -->
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Manajemen User</h3>
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
        <?php foreach ($tb_user as $row) : ?>
            <form class="form-horizontal" action="<?= base_url(''); ?>/User/update" method="post">
                <input type="hidden" name="username" value="<?= $username; ?>">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password Lama</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password Lama">
                            <input type="checkbox" onclick="myFunction()">&nbsp Show Password
                        </div>
                    </div>
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
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password Baru</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="passwordbaru" name="passwordbaru" placeholder="Password Baru">
                            <input type="checkbox" onclick="myFunction2()">&nbsp Show Password
                        </div>
                    </div>
                    <script>
                        function myFunction2() {
                            var x = document.getElementById("passwordbaru");
                            if (x.type === "password") {
                                x.type = "text";
                            } else {
                                x.type = "password";
                            }
                        }
                    </script>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Ulangi Password Baru</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="passwordbaru2" name="passwordbaru2" placeholder="Ulangi Password Baru">
                            <input type="checkbox" onclick="myFunction3()">&nbsp Show Password
                        </div>
                    </div>
                    <script>
                        function myFunction3() {
                            var x = document.getElementById("passwordbaru2");
                            if (x.type === "password") {
                                x.type = "text";
                            } else {
                                x.type = "password";
                            }
                        }
                    </script>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info float-right"><i class="far fa-edit"></i>&nbsp;Edit</button>
                </div>
                <!-- /.card-footer -->
            </form>
        <?php endforeach; ?>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

<?= $this->endsection(); ?>