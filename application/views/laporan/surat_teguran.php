<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Teguran</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 50px;
        }
        .header img {
            width: 100px;
        }
        .header h1, .header h2 {
            margin: 0;
        }
        .content {
            margin: 0 50px;
        }
        .content h3 {
            text-align: center;
            text-decoration: underline;
        }
        .content p {
            text-align: justify;
        }
        .details {
            display: grid;
            grid-template-columns: auto 1fr;
            column-gap: 10px;
            row-gap: 5px;
        }
        .ttd {
            margin-top: 50px;
            width: 100%;
            text-align: right;
        }
        .ttd p {
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="<?= base_url('asset/icon/ich_school.svg'); ?>" style="width: 100px;" alt="Logo Sekolah">
        <br><br>
        <h1>Ichthus School</h1>
        <p>Jl. Caringin Barat No.1 12, RT.12/RW.10, Cilandak Bar., Kec. Cilandak, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12430</p>
        <hr>
    </div>
    <div class="content">
        <h3>SURAT TEGURAN</h3>
        <p>Yang bertanda tangan di bawah ini, Kepala Sekolah Ichthus School, memberikan teguran kepada:</p>
        <div class="details">
            <p>Nama</p>
            <p>: <?= $siswa['nama']; ?></p>
            <p>NIS</p>
            <p>: <?= $siswa['nis']; ?></p>
            <p>Kelas</p>
            <p>: <?= $siswa['kelas']; ?></p>
            <p>Alamat</p>
            <p>: <?= $siswa['alamat']; ?></p>
        </div>
        <p>Bahwa siswa tersebut belum melakukan pembayaran yang seharusnya diselesaikan sesuai dengan jadwal yang telah ditentukan. Kami mohon agar segera melakukan pembayaran untuk menghindari konsekuensi lebih lanjut.</p>
        <div class="ttd">
            <p>Kepala Sekolah</p>
            <br><br><br><br><br>
            <p>(Carolus Novi Mulianto)</p>
        </div>
    </div>
    <script type="text/javascript">
        window.addEventListener('load', function() {
            window.print();
        });

        window.addEventListener('afterprint', function() {
            setTimeout(function() {
                window.close();
            }, 500);
        });
    </script>
</body>

</html>
