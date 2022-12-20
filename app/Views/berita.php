<?= $this->extend('layout/layout'); ?>
<?= $this->section('content'); ?>
<?php
$session = session();
$success = $session->getFlashdata('success');
$message = $session->getFlashdata('message');
?>
<!-- Default box -->
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Berita</h3>
    </div>
    <div class="card-body">
        <?php if ($success != null) : ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php
                foreach ($success as $succ) {
                    echo $succ . '<br>';
                }
                ?>
            </div>
        <?php endif ?>
        <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus-circle"></i> Tambah Berita</button>
        <table id="example2" class="table table-striped table-bordered " style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Berita</th>
                    <th>Isi Berita</th>
                    <th>Kategori</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($tb_berita as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row->judul_berita; ?></td>
                        <td><?= $row->isi_berita; ?></td>
                        <td><?= $row->kategori; ?></td>
                        <td>
                            <a href="#" class="btn btn-info btn-sm btn-edit" data-berita_id="<?= $row->berita_id; ?>" data-judul_berita="<?= $row->judul_berita; ?>" data-kategori="<?= $row->judul_berita; ?>" data-isi_berita="<?= $row->isi_berita; ?>">
                                <i class="far fa-edit"></i></a>
                            <a href="#" class="btn btn-danger btn-sm btn-delete" data-berita_id="<?= $row->berita_id; ?>"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

<!-- Modal Add Product-->
<form role="form" action="<?= base_url(''); ?>/Berita/save" id="formtambahberita" method="post">
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Berita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Judul Berita</label>
                        <input type="text" class="form-control" required name="judul_berita" id="judul_berita" placeholder="Judul Berita">
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Isi Berita</label>
                            <textarea class="form-control" name="isi_berita" id="isi_berita" rows="3" placeholder="..."></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kategori Berita</label>
                        <select name="kategori_id" id="kategori_id" class="form-control select2">
                            <option value="">-Select-</option>
                            <?php foreach ($tb_kategori as $row) : ?>
                                <option value="<?= $row->kategori_id; ?>"><?= $row->kategori; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Add Product-->

<!-- Modal Edit Product-->
<form role="form" action="<?= base_url(''); ?>/Berita/update" id="formeditberita" method="post">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Berita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Judul Berita</label>
                        <input type="text" class="form-control judul_berita" required name="judul_berita" id="judul_berita" placeholder="Judul Berita">
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Isi Berita</label>
                            <textarea class="form-control isi_berita" name="isi_berita" id="isi_berita" rows="3" placeholder="..."></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kategori Berita</label>
                        <select name="kategori_id" id="kategori_id" class="form-control select2 kategori_id">
                            <option value="">-Select-</option>
                            <?php foreach ($tb_kategori as $row) : ?>
                                <option value="<?= $row->kategori_id; ?>"><?= $row->kategori; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="berita_id" class="berita_id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit Product-->

<!-- Modal Delete Product-->
<form action="<?= base_url(''); ?>/Berita/delete" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Berita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Yakin untuk menghapus berita ini?</h4>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="berita_id" class="berita_id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Delete Product-->

<script type="text/javascript">
    $(document).ready(function() {

        // get Edit Product
        $('.btn-edit').on('click', function() {
            // get data from button edit
            const berita_id = $(this).data('berita_id');
            const judul_berita = $(this).data('judul_berita');
            const isi_berita = $(this).data('isi_berita');
            // Set data to Form Edit
            $('.berita_id').val(berita_id);
            $('.judul_berita').val(judul_berita);
            $('#isi_berita').val(isi_berita);
            // Call Modal Edit
            $('#editModal').modal('show');
        });

        // get Delete Product
        $('.btn-delete').on('click', function() {
            // get data from button edit
            const berita_id = $(this).data('berita_id');
            // Set data to Form Edit
            $('.berita_id').val(berita_id);
            // Call Modal Edit
            $('#deleteModal').modal('show');
        });

        $('#formtambahberita').validate({
            rules: {
                judul_berita: {
                    required: true,
                },
                isi_berita: {
                    required: true,
                },
            },
            messages: {
                judul_berita: {
                    required: "Wajib Diisi",
                },
                isi_berita: {
                    required: "Wajib Diisi",
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

        $('#formeditberita').validate({
            rules: {
                judul_berita: {
                    required: true,
                },
                isi_berita: {
                    required: true,
                },
            },
            messages: {
                judul_berita: {
                    required: "Wajib Diisi",
                },
                isi_berita: {
                    required: "Wajib Diisi",
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

        jQuery.validator.addMethod("nama", function(value, element) {
            return this.optional(element) || /^[a-z0-9\-\s]+$/i.test(value);
        });

        jQuery.validator.addMethod("numeric", function(value, element) {
            return this.optional(element) || /^[0-9-+]+$/.test(value);
        });

    });
</script>

<?= $this->endsection(); ?>