<?= $this->extend('layout/template_users') ?>

<?= $this->section('content') ?>
<!-- Contact Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="text-center pb-2">
            <p class="section-title px-5">
                <span class="px-2 text-secondary">Daftar Sebagai Peserta Didik</span>
            </p>
            <h1 class="mb-4">Peserta Didik</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form name="sentMessage" id="sendLamaran" novalidate="novalidate">
                        <?= csrf_field(); ?>
                        <div class="control-group">
                            <label for="nomor_whatsapp_wali">Nomor Whatsapp Mom/Dad:</label>
                            <input type="text" class="form-control" id="nomor_whatsapp_wali" name="nomor_whatsapp_wali" placeholder="contoh : 6282xxxxxx" />
                            <p class="help-block text-danger error-nomor-whatsapp-wali"></p>
                        </div>

                        <div class="control-group">
                            <label for="nama_lengkap_anak">Nama Lengkap Anak :</label>
                            <input type="text" class="form-control" id="nama_lengkap_anak" name="nama_lengkap_anak" placeholder="Masukan Nama Lengkap" data-validation-required-message="Please enter your name" />
                            <p class="help-block text-danger error-nama-lengkap-anak"></p>
                        </div>

                        <div class="control-group">
                            <label for="tanggal_lahir_anak">Tanggal Lahir Anak :</label>
                            <input type="date" class="form-control" id="tanggal_lahir_anak" name="tanggal_lahir_anak" />
                            <p class="help-block text-danger error-tanggal-lahir-anak"></p>
                        </div>

                        <div class="control-group">
                            <label for="usia_anak">Usia Anak :</label>
                            <input type="number" class="form-control" id="usia_anak" name="usia_anak" placeholder="contoh : 2" />
                            <p class="help-block text-danger error-usia-anak"></p>
                        </div>

                        <div class="control-group">
                            <label for="alamat_domisili_anak">Alamat Domisili Anak :</label>
                            <textarea name="alamat_domisili_anak" id="alamat_domisili_anak" class="form-control"></textarea>
                            <p class="help-block text-danger error-alamat-domisili-anak"></p>
                        </div>


                        <div class="control-group">
                            <label for="sekolah_anak">Sekolah Anak :</label>
                            <input type="text" class="form-control" id="sekolah_anak" name="sekolah_anak" placeholder="SDN ...." />
                            <p class="help-block text-danger error-sekolah-anak"></p>
                        </div>

                        <div class="control-group">
                            <label for="username_instagram_wali">Username Instagram Mom/Dad:</label>
                            <input type="text" class="form-control" id="username_instagram_wali" name="username_instagram_wali" placeholder="Masukan Username Instagram : @abc" />
                            <p class="help-block text-danger error-username-instagram-wali"></p>
                        </div>

                        <div class="control-group">
                            <label for="info_les">Tahu Alifya dari (Boleh Sebut Nama) :</label>
                            <input type="text" class="form-control" id="info_les" name="info_les" />
                            <p class="help-block text-danger error-info_les"></p>
                        </div>

                        <div class="control-group">
                            <label for="program_belajar_id">Program Belajar :</label>
                            <select name="program_belajar_id" id="program_belajar_id" class="form-control">
                                <option value="">--Silahkan Pilih</option>
                                <?php foreach ($program_belajar as $program_belajar) : ?>
                                    <option value="<?= $program_belajar->id ?>"><?= $program_belajar->nama_program ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <p class="help-block text-danger error-program-belajar"></p>
                        </div>
                        <div class="control-group">
                            <label for="materi_belajar_id">Materi Belajar :</label>
                            <select name="materi_belajar_id" id="materi_belajar_id" class="form-control">
                                <option value="">--Silahkan Pilih</option>
                                <?php foreach ($materi_belajar as $materi_belajar) : ?>
                                    <option value="<?= $materi_belajar->id ?>"><?= $materi_belajar->level ?> - <?= $materi_belajar->keterangan ?></option>
                                <?php endforeach; ?>
                            </select>
                            <p class="help-block text-danger error-materi-belajar"></p>
                        </div>

                        <div class="control-group">
                            <label for="hari_belajar">Ajuan Opsi Hari Les :</label>
                            <input type="text" class="form-control" id="hari_belajar" name="hari_belajar" placeholder=" contoh :senin & sabtu" />
                            <p class="help-block text-danger error-hari-belajar"></p>
                        </div>

                        <div class="control-group">
                            <label for="waktu_belajar">Ajuan Opsi Waktu Les :</label>
                            <input type="text" class="form-control" id="waktu_belajar" name="waktu_belajar" placeholder=" contoh :pagi & siang" />
                            <p class="help-block text-danger error-waktu-belajar"></p>
                        </div>

                        <div class="control-group">
                            <label for="foto_anak">Foto Anak :</label>
                            <input type="file" class="form-control" id="foto_anak" name="foto_anak" />
                            <p class="help-block text-danger error-foto-anak"></p>
                        </div>
                        <div class="control-group">
                            <label for="brosur">Saya Sudah Mengetahui Program dan Biaya Paket Belajar melalui Brosur / Internet :</label>
                            <select name="brosur" id="brosur" class="form-control">
                                <option value="">--Silahkan Pilih--</option>
                                <option value="ya">ya</option>
                            </select>

                            <p class="help-block text-danger error-brosur"></p>
                        </div>

                        <div class="control-group">
                            <label for="data">Saya Sudah Mengisi data diatas dengan benar, jujur, dan dapat dipertanggung jawabkan :</label>
                            <select name="data" id="data" class="form-control">
                                <option value="">--Silahkan Pilih--</option>
                                <option value="ya">ya</option>
                            </select>
                            <p class="help-block text-danger error-data"></p>
                        </div>

                        <div>
                            <button class="btn btn-primary py-2 px-10 save" type="submit" id="sendMessageButton">
                                Kirim Lamaran
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Contact End -->

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script>
    $("#sendLamaran").submit(function(e) {
        e.preventDefault();

        let nama_lengkap_anak = $("#nama_lengkap_anak").val();
        let tanggal_lahir_anak = $("#tanggal_lahir_anak").val();
        let usia_anak = $("#usia_anak").val();
        let alamat_domisili_anak = $("#alamat_domisili_anak").val();
        let sekolah_anak = $("#sekolah_anak").val();
        let nomor_whatsapp_wali = $("#nomor_whatsapp_wali").val();
        let username_instagram_wali = $("#username_instagram_wali").val();
        let program_belajar_id = $("#program_belajar_id").val();
        let materi_belajar_id = $("#materi_belajar_id").val();
        let hari_belajar = $("#hari_belajar").val();
        let waktu_belajar = $("#waktu_belajar").val();
        let foto_anak = $("#foto_anak").val();
        let data = $("#data").val();
        let brosur = $("#brosur").val();
        let info_les = $("#info_les").val();

        let formData = new FormData(this);

        formData.append('nama_lengkap_anak', nama_lengkap_anak);
        formData.append('tanggal_lahir_anak', tanggal_lahir_anak);
        formData.append('usia_anak', usia_anak);
        formData.append('alamat_domisili_anak', alamat_domisili_anak);
        formData.append('sekolah_anak', sekolah_anak);
        formData.append('nomor_whatsapp_wali', nomor_whatsapp_wali);
        formData.append('username_instagram_wali', username_instagram_wali);
        formData.append('program_belajar_id', program_belajar_id);
        formData.append('materi_belajar_id', materi_belajar_id);
        formData.append('hari_belajar', hari_belajar);
        formData.append('waktu_belajar', waktu_belajar);
        formData.append('foto_anak', foto_anak);
        formData.append('brosur', brosur);
        formData.append('data', data);
        formData.append('info_les', info_les);

        $.ajax({
            url: '/daftar_peserta_didik/insert',
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
                $('.save').html(`<button class="btn btn-primary py-2 px-10 save" type="submit" id="sendMessageButton">
                                Kirim Lamaran
                            </button>`)
                $('.save').prop('disabled', false);
                if (response.error) {
                    if (response.error.nama_lengkap_anak) {
                        $("#nama_lengkap_anak").addClass('is-invalid');
                        $(".error-nama-lengkap-anak").html(response.error.nama_lengkap_anak);
                    } else {
                        $("#nama_lengkap_anak").removeClass('is-invalid');
                        $(".error-nama-lengkap-anak").html('');
                    }
                    if (response.error.tanggal_lahir_anak) {
                        $("#tanggal_lahir_anak").addClass('is-invalid');
                        $(".error-tanggal-lahir-anak").html(response.error.tanggal_lahir_anak);
                    } else {
                        $("#tanggal_lahir_anak").removeClass('is-invalid');
                        $(".error-tanggal-lahir-anak").html('');
                    }
                    if (response.error.nomor_whatsapp_wali) {
                        $("#nomor_whatsapp_wali").addClass('is-invalid');
                        $(".error-nomor-whatsapp-wali").html(response.error.nomor_whatsapp_wali);
                    } else {
                        $("#nomor_whatsapp_wali").removeClass('is-invalid');
                        $(".error-nomor-whatsapp-wali").html('');
                    }
                    if (response.error.usia_anak) {
                        $("#usia_anak").addClass('is-invalid');
                        $(".error-usia-anak").html(response.error.usia_anak);
                    } else {
                        $("#usia_anak").removeClass('is-invalid');
                        $(".error-usia-anak").html('');
                    }
                    if (response.error.alamat_domisili_anak) {
                        $("#alamat_domisili_anak").addClass('is-invalid');
                        $(".error-alamat-domisili-anak").html(response.error.alamat_domisili_anak);
                    } else {
                        $("#alamat_domisili_anak").removeClass('is-invalid');
                        $(".error-alamat-domisili-anak").html('');
                    }
                    if (response.error.sekolah_anak) {
                        $("#sekolah_anak").addClass('is-invalid');
                        $(".error-sekolah-anak").html(response.error.sekolah_anak);
                    } else {
                        $("#sekolah_anak").removeClass('is-invalid');
                        $(".error-sekolah-anak").html('');
                    }
                    if (response.error.username_instagram_wali) {
                        $("#username_instagram_wali").addClass('is-invalid');
                        $(".error-username-instagram-wali").html(response.error.username_instagram_wali);
                    } else {
                        $("#username_instagram_wali").removeClass('is-invalid');
                        $(".error-username-instagram-wali").html('');
                    }
                    if (response.error.info_les) {
                        $("#info_les").addClass('is-invalid');
                        $(".error-info_les").html(response.error.info_les);
                    } else {
                        $("#info_les").removeClass('is-invalid');
                        $(".error-info_les").html('');
                    }
                    if (response.error.program_belajar_id) {
                        $("#program_belajar_id").addClass('is-invalid');
                        $(".error-program-belajar").html(response.error.program_belajar_id);
                    } else {
                        $("#program_belajar_id").removeClass('is-invalid');
                        $(".error-program-belajar").html('');
                    }
                    if (response.error.materi_belajar_id) {
                        $("#materi_belajar_id").addClass('is-invalid');
                        $(".error-materi-belajar").html(response.error.materi_belajar_id);
                    } else {
                        $("#materi_belajar_id").removeClass('is-invalid');
                        $(".error-materi-belajar").html('');
                    }
                    if (response.error.hari_belajar) {
                        $("#hari_belajar").addClass('is-invalid');
                        $(".error-hari-belajar").html(response.error.hari_belajar);
                    } else {
                        $("#hari_belajar").removeClass('is-invalid');
                        $(".error-hari-belajar").html('');
                    }
                    if (response.error.waktu_belajar) {
                        $("#waktu_belajar").addClass('is-invalid');
                        $(".error-waktu-belajar").html(response.error.waktu_belajar);
                    } else {
                        $("#waktu_belajar").removeClass('is-invalid');
                        $(".error-waktu-belajar").html('');
                    }
                    if (response.error.foto_anak) {
                        $("#foto_anak").addClass('is-invalid');
                        $(".error-foto-anak").html(response.error.foto_anak);
                    } else {
                        $("#foto_anak").removeClass('is-invalid');
                        $(".error-foto-anak").html('');
                    }
                    if (response.error.brosur) {
                        $("#brosur").addClass('is-invalid');
                        $(".error-brosur").html(response.error.brosur);
                    } else {
                        $("#brosur").removeClass('is-invalid');
                        $(".error-brosur").html('');
                    }
                    if (response.error.data) {
                        $("#data").addClass('is-invalid');
                        $(".error-data").html(response.error.data);
                    } else {
                        $("#data").removeClass('is-invalid');
                        $(".error-data").html('');
                    }

                } else {
                    Swal.fire({
                        icon: 'success',
                        title: `${response.success}`,
                    });
                    setTimeout(function() {
                        window.location.href = '/';
                    }, 4000)
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: `Data Belum Tersimpan!`,
                });
                $('.save').html(`<button class="btn btn-primary py-2 px-10 save" type="submit" id="sendMessageButton">
                                Kirim Lamaran
                            </button>`)
                $('.save').prop('disabled', false);
            }
        });
    })
</script>


<?= $this->endSection(); ?>