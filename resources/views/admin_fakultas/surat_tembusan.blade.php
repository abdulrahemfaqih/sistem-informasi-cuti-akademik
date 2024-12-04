<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Cuti - {{ $pengajuan->mahasiswa->user->name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.5;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1, h2, h3 {
            text-align: center;
        }
        .content {
            margin-top: 20px;
        }
        .content p {
            margin-bottom: 10px;
        }
        .signature {
            margin-top: 40px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Surat Cuti Akademik</h1>
        <h3>Universitas Trunojoyo Madura</h3>

        <div class="content">
            <p>Dengan hormat,</p>
            <p>Yang bertanda tangan di bawah ini:</p>
            <p><strong>Nama:</strong> {{ $pengajuan->mahasiswa->user->name }}</p>
            <p><strong>NIM:</strong> {{ $pengajuan->mahasiswa->nim }}</p>
            <p><strong>Program Studi:</strong> {{ $pengajuan->mahasiswa->prodi->nama }}</p>
            <p><strong>Tahun Ajaran:</strong> {{ $pengajuan->tahunAjaran->tahun_ajaran }}</p>
            <p><strong>Semester:</strong> {{ $pengajuan->semester->semester }}</p>

            <p>Dengan ini mengajukan permohonan cuti akademik dengan alasan sebagai berikut:</p>
            <p><strong>Alasan:</strong> {{ $pengajuan->alasan }}</p>

            <p>Surat ini diterbitkan pada tanggal {{ $pengajuan->disetujui_pada }}.</p>
        </div>

        <div class="signature">
            <p>Mengetahui,</p>
            <p>Fakultas XYZ</p>
        </div>
    </div>
</body>
</html>
