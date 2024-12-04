<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Surat Permohonan</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: Arial, sans-serif;
      padding: 0;
      margin: 0;
    }

    .container {
      padding: 1.5rem;
      margin: 0 auto;
    }

    .text-center {
      text-align: center;
    }

    .mb-2 {
      margin-bottom: 0.5rem;
    }

    .mb-4 {
      margin-bottom: 1rem;
    }

    .font-bold {
      font-weight: bold;
    }

    .text-lg {
      font-size: 1.125rem;
    }

    .text-blue-500 {
      color: #3b82f6;
    }

    .list-disc {
      list-style-type: disc;
    }

    .list-decimal {
      list-style-type: decimal;
    }

    .list-inside {
      padding-left: 0;
      list-style-position: inside;
    }

    .flex {
      display: flex;
    }

    .justify-between {
      justify-content: space-between;
    }

    .justify-center {
      justify-content: center;
    }

    .mx-auto {
      margin-left: auto;
      margin-right: auto;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="flex text-center mb-4">
      <div>
        <img alt="Logo UTM" class="mx-auto mb-2" height="100" src="{{ asset('logo-utm.png') }}" width="100" />
      </div>
      <div>
        <h1 class="text-lg font-bold">
          KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI
        </h1>
        <h2 class="text-lg font-bold">
          UNIVERSITAS TRUNOJOYO MADURA
        </h2>
        <p>Jl. Raya Telang, PO BOX 2 Kamal, Bangkalan-Madura</p>
        <p>Telp. (031) 3011146, Fax. (031) 3011506</p>
        <p>
          Laman:
          <a class="text-blue-500" href="http://www.trunojoyo.ac.id">www.trunojoyo.ac.id</a>
        </p>
      </div>
    </div>
    <h3 class="text-center font-bold text-lg mb-4">
      SURAT PERMOHONAN BERHENTI STUDI SEMENTARA (BSS)
    </h3>
    <div class="mb-4">
      <p>Kepada Yth.</p>
      <p>Kepala BAAKPSI</p>
      <p>Universitas Trunojoyo Madura</p>
      <p>Di Bangkalan</p>
    </div>
    <div class="mb-4">
      <p>Dengan ini saya:</p>
      <p>
        Nama: <span class="font-bold">{{ $pengajuanBss->mahasiswa->user->name }}</span>
      </p>
      <p>NIM: <span class="font-bold">{{ $pengajuanBss->mahasiswa->nim }}</span></p>
      <p>Fakultas: <span class="font-bold">{{ $pengajuanBss->mahasiswa->prodi->fakultas->nama }}</span></p>
      <p>Program Studi: <span class="font-bold">{{ $pengajuanBss->mahasiswa->prodi->nama }}</span></p>
      <p>
        Alamat Rumah:
        <span class="font-bold">{{ $pengajuanBss->mahasiswa->alamat }}</span>
      </p>
    </div>
    <div class="mb-4">
      <p>
        Mengajukan permohonan Berhenti Studi Sementara (BSS) dengan
        alasan:
      </p>
      <ul class="list-disc list-inside">
        <li>Sakit dan perlu istirahat/perawatan</li>
        <li>Kerja Praktek/Dinas</li>
        <li>Keperluan lain yang bersifat pribadi</li>
      </ul>
      <p>untuk semester {{ $pengajuanBss->semester->semester }} tahun akademik
        {{ $pengajuanBss->tahunAjaran->tahun_ajaran }}</p>
    </div>
    <div class="mb-4">
      <p>
        Demikian surat permohonan ini kami sampaikan, terima kasih
      </p>
    </div>
    <div class="flex justify-between mb-4">
      <div>
        <br />
        <p>Orang Tua Wali,</p>
        <br />
        <br />
        <br />
        <br />
        <br />
        <p class="font-bold">..............................</p>
      </div>
      <div>
        <p>Bangkalan, {{ \Carbon\Carbon::now()->locale('id')->isoFormat('DD MMMM YYYY') }}</p>
        <p>Pemohon,</p>
        <br />
        <br />
        <br />
        <br />
        <br />
        <p class="font-bold">{{ $pengajuanBss->mahasiswa->user->name }}</p>
      </div>
    </div>
    <div class="flex justify-center mb-4">
      <div>
        <p>Ketua Program Studi</p>
        <br />
        <br />
        <br />
        <br />
        <br />
        <p class="font-bold">..............................</p>
        <p>NIP: ..............................</p>
      </div>
    </div>
    <div class="mb-4">
      <p>Keterangan:</p>
      <p>Melampirkan:</p>
      <ol class="list-decimal list-inside">
        <li>Kartu Mahasiswa</li>
        <li>Surat bebas tanggungan dari fakultas</li>
        <li>Surat bebas perpustakaan</li>
        <li>Surat bebas tanggungan laboratorium (jika ada)</li>
      </ol>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      window.print();
    });
  </script>
</body>

</html>
