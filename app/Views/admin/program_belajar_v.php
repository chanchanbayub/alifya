<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="pagetitle">
    <h1>Program Belajar</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">|</a></li>
            <li class="breadcrumb-item active">Program Belajar</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">

                <!-- Recent Sales -->
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">

                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Aksi</h6>
                                </li>
                                <li><a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="bi bi-plus"></i> Tambah Program Belajar</a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Program Belajar <span>| Table </span></h5>
                            <table class="table table-bordered datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Program</th>
                                        <th scope="col">Jumlah Pertemuan</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($program_belajar as $program) : ?>
                                        <tr>
                                            <th scope="row"><a href="#"><?= $no++ ?></a></th>
                                            <td><?= $program->nama_program ?></td>
                                            <td><?= $program->jumlah_pertemuan ?> x dalam sebulan</td>
                                            <td>Rp. <?= number_format($program->harga) ?> </td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-warning" id="edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $program->id ?>" type="button">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger" id="delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?= $program->id ?>" type="button">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                                <a href="../banner/<?= $program->banner ?>" target="_blank" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div><!-- End Recent Sales -->

            </div>
        </div><!-- End Left side columns -->

    </div>
</section>

<!-- modal save-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Program Belajar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add_form">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="nama_program" class="col-form-label">Nama Program :</label>
                        <input type="text" class="form-control" id="nama_program" name="nama_program" placeholder="cth: smart">
                        <div class="invalid-feedback error-nama-program">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_pertemuan" class="col-form-label">Jumlah Pertemuan :</label>
                        <input class="form-control" id="jumlah_pertemuan" name="jumlah_pertemuan" placeholder="cth : 4"></input>
                        <div class="invalid-feedback error-jumlah-pertemuan">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="col-form-label">Harga :</label>
                        <input type="number" class="form-control" id="harga" name="harga" placeholder="120000"></input>
                        <div class="invalid-feedback error-harga">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="banner" class="col-form-label">Banner :</label>
                        <input type="file" class="form-control" id="banner" name="banner"></input>
                        <div class="invalid-feedback error-banner">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"><i class="bi bi-x-square"></i> Batal</button>
                        <button type="submit" class="btn btn-outline-success save"> <i class="bi bi-arrow-right"></i> Kirim</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- End Modal Save -->

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Form <small>Edit Program Belajar</small> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit_form" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <input type="text" class="form-control" id="id_edit" name="id">
                        <input type="text" class="form-control" id="banner_lama" name="banner_lama">
                        <label for="nama_program_edit" class="col-form-label">Nama Program :</label>
                        <input type="text" class="form-control" id="nama_program_edit" name="nama_program">
                        <div class="invalid-feedback error-nama-program-edit">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="jumlah_pertemuan_edit" class="col-form-label">Jumlah Pertemuan :</label>
                        <input name="jumlah_pertemuan" id="jumlah_pertemuan_edit" class="form-control">
                        <div class="invalid-feedback error-jumlah-pertemuan-edit">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="harga_edit" class="col-form-label">Jumlah Pertemuan :</label>
                        <input type="number" name="harga" id="harga_edit" class="form-control">
                        <div class="invalid-feedback error-harga-edit">

                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="banner_edit" class="col-form-label">Banner :</label>
                        <input type="file" class="form-control" id="banner_edit" name="banner"></input>
                        <div class="invalid-feedback error-banner-edit">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"> <i class="bi bi-x-lg"></i> Batal</button>
                        <button type="submit" class="btn btn-outline-success update"> <i class="bi bi-arrow-right"></i> Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Edit Modal-->

<!-- Modal hapus  -->
<div class="modal fade" id="deleteModal" tabindex="0">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form <small> Hapus Program Belajar </small></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="delete_form">
                    <?= csrf_field(); ?>
                    <input type="hidden" class="form-control" id="id_delete" name="id">
                    <div class="modal-body">
                        <p>Apakah Anda Yakin ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal"> <i class="bi bi-x-lg"></i> Batal</button>
                        <button type="submit" class="btn btn-outline-danger button_delete"> <i class="bi bi-trash"></i> Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End hapus Modal-->


<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(e) {
        $("#add_form").submit(function(e) {
            e.preventDefault();

            let nama_program = $("#nama_program").val();
            let jumlah_pertemuan = $("#jumlah_pertemuan").val();
            let harga = $("#harga").val();
            let banner = $("#banner").val();

            let formData = new FormData(this);

            formData.append('nama_program', nama_program);
            formData.append('jumlah_pertemuan', jumlah_pertemuan);
            formData.append('harga', harga);
            formData.append('banner', banner);

            $.ajax({
                url: '/admin/program_belajar/insert',
                data: formData,
                dataType: 'json',
                enctype: 'multipart/form-data',
                type: 'POST',
                contentType: false,
                processData: false,
                cache: false,
                beforeSend: function() {
                    $('.save').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                    $('.save').prop('disabled', true);
                },
                success: function(response) {
                    $('.save').html('<i class="bi bi-box-arrow-in-right"></i> Kirim');
                    $('.save').prop('disabled', false);
                    if (response.error) {
                        if (response.error.nama_program) {
                            $("#nama_program").addClass('is-invalid');
                            $(".error-nama-program").html(response.error.nama_program);
                        } else {
                            $("#nama_program").removeClass('is-invalid');
                            $(".error-nama-program").html('');
                        }

                        if (response.error.jumlah_pertemuan) {
                            $("#jumlah_pertemuan").addClass('is-invalid');
                            $(".error-jumlah-pertemuan").html(response.error.jumlah_pertemuan);
                        } else {
                            $("#jumlah_pertemuan").removeClass('is-invalid');
                            $(".error-jumlah-pertemuan").html('');
                        }

                        if (response.error.harga) {
                            $("#harga").addClass('is-invalid');
                            $(".error-harga").html(response.error.harga);
                        } else {
                            $("#harga").removeClass('is-invalid');
                            $(".error-harga").html('');
                        }

                        if (response.error.banner) {
                            $("#banner").addClass('is-invalid');
                            $(".error-banner").html(response.error.banner);
                        } else {
                            $("#banner").removeClass('is-invalid');
                            $(".error-banner").html('');
                        }

                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: `${response.success}`,
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 1000)
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: `Data Belum Tersimpan!`,
                    });
                    $('.save').html('<i class="bi bi-box-arrow-in-right"></i> Kirim');
                    $('.save').prop('disabled', false);
                }
            });
        })
    });

    // Aksi Edit 
    $(document).on('click', "#edit", function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax({
            url: '/admin/program_belajar/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                // console.log(response);
                $("#id_edit").val(response.id);
                $("#nama_program_edit").val(response.nama_program);
                $("#banner_lama").val(response.banner);
                $("#jumlah_pertemuan_edit").val(response.jumlah_pertemuan);
                $("#harga_edit").val(response.harga);
            }
        });
    });

    $("#edit_form").submit(function(e) {
        e.preventDefault();
        let id = $('#id_edit').val();
        let banner_lama = $('#banner_lama').val();
        let nama_program = $('#nama_program_edit').val();
        let jumlah_pertemuan = $('#jumlah_pertemuan_edit').val();
        let harga = $('#harga_edit').val();
        let banner = $('#banner_edit').val();

        let formData = new FormData(this);

        formData.append('id', id);
        formData.append('banner_lama', banner_lama);
        formData.append('nama_program', nama_program);
        formData.append('jumlah_pertemuan', jumlah_pertemuan);
        formData.append('harga', harga);
        formData.append('banner', banner);

        $.ajax({
            url: '/admin/program_belajar/update',
            data: formData,
            dataType: 'json',
            enctype: 'multipart/form-data',
            type: 'POST',
            contentType: false,
            processData: false,
            cache: false,
            beforeSend: function() {
                $('.update').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                $('.update').prop('disabled', true);
            },
            success: function(response) {
                $('.update').html('<i class="bi bi-box-arrow-in-right"></i> Kirim');
                $('.update').prop('disabled', false);
                if (response.error) {
                    if (response.error.nama_program) {
                        $("#nama_program_edit").addClass('is-invalid');
                        $(".error-nama-program-edit").html(response.error.nama_program);
                    } else {
                        $("#nama_program_edit").removeClass('is-invalid');
                        $(".error-nama-program-edit").html('');
                    }

                    if (response.error.jumlah_pertemuan) {
                        $("#jumlah_pertemuan_edit").addClass('is-invalid');
                        $(".error-jumlah-pertemuan-edit").html(response.error.jumlah_pertemuan);
                    } else {
                        $("#jumlah_pertemuan_edit").removeClass('is-invalid');
                        $(".error-jumlah-pertemuan-edit").html('');
                    }

                    if (response.error.harga) {
                        $("#harga_edit").addClass('is-invalid');
                        $(".error-harga-edit").html(response.error.harga);
                    } else {
                        $("#harga_edit").removeClass('is-invalid');
                        $(".error-harga-edit").html('');
                    }

                    if (response.error.banner) {
                        $("#banner_edit").addClass('is-invalid');
                        $(".error-banner-edit").html(response.error.banner);
                    } else {
                        $("#banner_edit").removeClass('is-invalid');
                        $(".error-banner-edit").html('');
                    }

                } else {
                    Swal.fire({
                        icon: 'success',
                        title: `${response.success}`,
                    });
                    setTimeout(function() {
                        location.reload();
                    }, 1000)
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: `Data Belum Tersimpan!`,
                });
                $('.save').html('<i class="bi bi-box-arrow-in-right"></i> Kirim');
                $('.save').prop('disabled', false);
            }
        });
    });
    // End Aksi

    // Aksi Hapus
    $(document).on('click', "#delete", function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax({
            url: '/admin/program_belajar/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                $("#id_delete").val(response.id);
            }
        });
    });

    $("#delete_form").submit(function(e) {
        e.preventDefault();
        let id = $("#id_delete").val();
        $.ajax({
            url: '/admin/program_belajar/delete',
            method: 'post',
            dataType: 'JSON',
            data: {
                id: id,
            },
            beforeSend: function() {
                $('.button_delete').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                $('.button_delete').prop('disabled', true);
            },
            success: function(response) {
                $('.button_delete').html('<i class="bi bi-trash"></i> Hapus');
                $('.button_delete').prop('disabled', false);

                $("#deleteModal").modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: `${response.success}`,
                });
                setTimeout(function() {
                    location.reload();
                }, 1000)
            },
            error: function(response) {

                Swal.fire({
                    icon: 'error',
                    title: `Data Gagal di Hapus!`,
                });
                $('.button_delete').html('<i class="bi bi-trash"></i> Hapus');
                $('.button_delete').prop('disabled', false);

            }
        });
    });
    // End Aksi Hapus
</script>

<?= $this->endSection(); ?>