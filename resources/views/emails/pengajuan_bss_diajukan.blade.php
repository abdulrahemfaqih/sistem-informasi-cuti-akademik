<!DOCTYPE html>
<html>

<head>
    <title>Pengajuan BSS Baru</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background-color: #f4f4f4;
            padding: 10px;
            text-align: center;
        }

        .content {
            padding: 20px;
        }

        .details {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Pengajuan BSS Baru</h2>
        </div>
        <div class="content">
            <p>Halo Admin BAK,</p>
            <p>Ada pengajuan BSS (Berhenti Studi Sementara) baru yang membutuhkan perhatian Anda.</p>

            <div class="details">
                <h3>Detail Mahasiswa</h3>
                <p><strong>Nama:</strong> {{$nama}} </p>
                <p><strong>NIM:</strong> {{$nim}} </p>
                <p><strong>Program Studi:</strong>{{$prodi}} </p>

                <h3>Detail Pengajuan</h3>
                <p><strong>Tahun Akademik:</strong> {{$tahunAkademik}} </p>
                <p><strong>Semester:</strong> {{$semester}}</p>
                <p><strong>Tanggal Pengajuan:</strong> </p>

                <h3>Alasan Pengajuan</h3>
                <p>{{$alasan}}</p>
            </div>

            <p style="margin-top: 20px;">Silakan login ke sistem untuk menindaklanjuti pengajuan ini.</p>
        </div>
    </div>
</body>

</html>
