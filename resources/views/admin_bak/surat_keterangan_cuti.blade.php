<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Cuti</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h3 {
            text-align: center;
        }

        .content {
            margin-top: 15px;
        }

        .content table {
            width: 100%;
            margin-top: 10px;
        }

        .content table td {
            padding: 5px;
        }

        .ttd {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
            text-align: right;
        }

        .ttd div {
            width: 250px;
            /* Opsional: untuk membatasi lebar div */
        }



        .judul {
            text-align: center;
            /* berikan underline */
            text-decoration: underline;
            font: bold
        }

        .nomor {
            text-align: center;
        }

        .tembusan {
            font-size: 10px;
        }
    </style>
</head>

<body>

    <div class="header">
        <!-- Jika Anda ingin menambahkan logo, bisa tambahkan di sini -->
        <h3 class="judul">SURAT IZIN BERHENTI STUDI SEMENTARA (BSS)</h3>
        <p class="nomor">Nomor: {{ $noSurat }}</p>
    </div>

    <div class="content">

        <p>Menunjukkan Surat Permohonan Berhenti Studi Sementara (BSS) Saudara atas:</p>

        <table>
            <tr>
                <td>Nama</td>
                <td>: {{ $namaMahasiswa }}</td>
            </tr>
            <tr>
                <td>NIM</td>
                <td>: {{ $nimMahasiswa }}</td>
            </tr>
            <tr>
                <td>Program Studi</td>
                <td>: {{ $prodi }}</td>
            </tr>
            <tr>
                <td>Fakultas</td>
                <td>: {{ $fakultas }}</td>
            </tr>
            <tr>
                <td>Tanggal Terbit</td>
                <td>: {{ $tanggalTerbit }}</td>
            </tr>
        </table>

        <p>Dan diberitahukan bahwa saudara diijinkan berhenti studi semestera untuk: </p>
        <table>
            <thead>
                <tr>
                    <th>Semester</th>
                    <th>Kelas</th>
                    <th>Tahun Akademik</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: center">{{ $semester }}</td>
                    <td style="text-align: center">Reguler</td>
                    <td style="text-align: center">{{ $tahunAkademik }}</td>
                </tr>
        </table>

        <p>Selanjutnya untuk mengikuti kegiatan akademik kembali, Sudara harus melakukan Her-Registrasi pada masa
            registrasi yang telah di tetapkan dalam kalender akademik untuk:</p>

        <table>
            <thead>
                <tr>
                    <th>Semester</th>
                    <th>Kelas</th>
                    <th>Tahun Akademik</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: center">{{ $semesterKembali }}</td>
                    <td style="text-align: center">Reguler</td>
                    <td style="text-align: center">{{ $tahunAkademikKembali }}</td>
                </tr>
            </tbody>
        </table>

        <p>Dan melakukan ketentuan - ketentuan yang telah ditetapkan di universitas Trunojoyo Madura. Demikian Surat
            Ijin Berhenti Studi Sementara untuk dipergunakan sebagaimana mestinya</p>



        <div class="ttd">
            <div>
                <p>Bangkalan, {{ $tanggalTerbit }}</p>
                <p>Wakil Rektor Biro Akademik</p>
                <br>
                <br>
                <p>Supriyanto</p>
                <p>NIP: 2389472389428</p>
            </div>
        </div>

        <div class="tembusan">
            <p>Tembusan Kepada Yth</p>
            <p>1. Wakil Rektor Bidang Akademik</p>
            <p>2. Dekan Fakultas {{ $fakultas }}</p>
            <p>3. Ka BUK</p>
            <p>4. Yang bersangkutan</p>
        </div>
    </div>

</body>

</html>
