<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Cuti - {{ $tanggungan->mahasiswa->user->name }}</title>
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
        <h1>Surat Bebas Tanggungan Fakultas</h1>
        <h3>Universitas Trunojoyo Madura</h3>

        <div class="content">
            <p>Yang bertanda tangan di bawah ini:</p>
            <p><strong>Nama:</strong> {{ $tanggungan->mahasiswa->user->name }}</p>
            <p><strong>NIM:</strong> {{ $tanggungan->mahasiswa->nim }}</p>
            <p><strong>Alasan:</strong> {{ $tanggungan->fakultas->nama }}</p>
            <p>Berdasarkan data kami mahasiswa yang bersangkutan tidak mempunyai tanggungan di Fakultas</p>
        </div>


        <div class="signature">
            <p>Mengetahui,</p>
            <p>Fakultas {{ $tanggungan->fakultas->nama }}</p>
        </div>
    </div>
</body>
</html>
