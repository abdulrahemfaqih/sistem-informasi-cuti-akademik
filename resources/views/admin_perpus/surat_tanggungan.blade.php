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
        <h1>Surat Bebas Tanggungan Perpustakaan</h1>
        <h3>Universitas Trunojoyo Madura</h3>

        <div class="content">
            <p>Yang bertanda tangan di bawah ini menerangkan bahwa :</p>
            <p></p>
            <p><strong>Nama:</strong> {{ $tanggungan->mahasiswa->user->name }}</p>
            <p><strong>NIM:</strong> {{ $tanggungan->mahasiswa->nim }}</p>
            <p><strong>Program Studi:</strong> {{ $tanggungan->mahasiswa->prodi->nama }}</p>
            <p></p>
            <p>Berdasarkan data kami mahasiswa yang bersangkutan tidak mempunyai pinjaman koleksi bahan pustaka di Perpustakaan Universitas Trunojoyo Madura.</p>
            <p>Demikian surat keterangan ini diberikan untuk dapat dipergunakan sebagaimana mestinya.</p>
        </div>


        <div class="signature">
            <p>Bangkalan, ..... ................. .........</p>
            <p>Kepala Perpustakaan, </p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p>H. Moh. Fais Rizqianshah, S. T., M. Kom.</p>
            <p>NIP. 200317689412752189</p>
        </div>
    </div>
</body>
</html>
