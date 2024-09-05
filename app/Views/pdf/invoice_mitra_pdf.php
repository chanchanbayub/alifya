<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice </title>
    <style>
        /* #table {
            padding: 20px 20px;
        } */


        #table th,
        td {
            width: 100%;
            /* border: 1px solid black; */
            font-size: 20px;
            text-align: center;
            box-sizing: border-box;
            border: 1px solid;
            text-transform: capitalize;
            height: 50px;
            border-collapse: collapse
        }


        .logo {
            text-align: center;
        }

        #logo_center {
            text-align: center;
        }

        #pengantar {
            text-align: left;
        }

        .container {
            box-sizing: border-box;
            width: 100%;
            border: 1px solid black;
            padding: 40px 20px;
        }

        .cap {
            box-sizing: border-box;
            /* position: absolute;
            left: 0px;
            top: 0px; */
            width: 180;
            /* z-index: -1; */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="assets/img/logo.png" id="logo_center" width="150" alt="logo">
        </div>
        <!-- <hr> -->
        <table id="pengantar">
            <thead>
                <tr>
                    <th scope="col">Mitra Pengajar</th>
                    <th scope="col">:</th>
                    <th scope="col" style="text-transform: capitalize;"><?= $mitra_pengajar->nama_lengkap ?> </th>
                </tr>

            </thead>
        </table>

        <table id="table">
            <thead>
                <tr>
                    <th scope="col">Pertemuan</th>
                    <th scope="col">Nama Anak</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Harga / Pertemuan</th>
                </tr>
            </thead>
            <tbody id="content-table">
                <?php $no = 1; ?>
                <?php foreach ($invoice as $invoice) : ?>
                    <tr>
                        <td>Pertemuan Ke -<?= $no++ ?> </td>
                        <td><?= $invoice->nama_lengkap_anak ?> </td>
                        <td> <?= tanggal_indonesia(date('Y-m-d', strtotime($invoice->tanggal_masuk))) ?>, <?= date_indo(date('Y-m-d', strtotime($invoice->tanggal_masuk))) ?></td>
                        <td> <?= date('H:i', strtotime($invoice->jam_masuk)) ?> </td>
                        <td> Rp. <?= number_format($harga->harga_mitra) ?> </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Media Pembelajaran</th>
                    <th>Rp. <?= number_format($media_belajar->harga_media) ?></th>
                </tr>
                <tr>
                    <th colspan="4">Total Pembayaran</th>
                    <th>Rp. <?= number_format($total * $harga->harga_mitra + $media_belajar->harga_media) ?></th>
                </tr>

                <tr>
                    <th colspan="4" style="border: 0;"></th>
                    <th style="border: 0;">Tasikmalaya, <?= date('d F Y') ?></th>
                </tr>
                <tr>
                    <th colspan="4" style="border: 0;"></th>
                    <th style="border: 0;">Founder,</th>
                </tr>
                <tr>
                    <th colspan="4" style="border: 0;"></th>
                    <th style="border: 0;"><img src="assets/img/ttd_anisa.png" alt="" class="ttd"></th>
                </tr>
                <tr>
                    <th colspan="4" style="border: 0;"></th>
                    <th style="border: 0;">Annisa Shofaril Wahidah Y</th>
                </tr>
            </tfoot>
        </table>
        <img src="assets/img/cap.png" alt="" style="margin-left:890px; margin-top:-150px;" class="cap">
    </div>
</body>

</html>