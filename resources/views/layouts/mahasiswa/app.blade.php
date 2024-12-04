<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet">
  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-50 dark:bg-gray-800">
  @if (session())
    @if (session()->has('success'))
      <x-alert.success>{{ session('success') }}</x-alert.success>
    @elseif (session()->has('error'))
      <x-alert.error>{{ session('error') }}</x-alert.error>
    @elseif (session()->has('info'))
      <x-alert.info>{{ session('info') }}</x-alert.info>
    @elseif (session()->has('warning'))
      <x-alert.warning>{{ session('warning') }}</x-alert.warning>
    @elseif (session()->has('question'))
      <x-alert.question>{{ session('question') }}</x-alert.question>
    @endif
  @endif

  @include('layouts.mahasiswa.navbar')
  <div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
    @include('layouts.mahasiswa.sidebar')
    <div class="fixed inset-0 z-10 hidden bg-gray-900/50 dark:bg-gray-900/90" id="sidebarBackdrop"></div>
    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
      <!-- Page Content -->
      <main>
        {{ $slot }}
      </main>

      @include('layouts.mahasiswa.footer')
    </div>
  </div>
  <script src="https://flowbite-admin-dashboard.vercel.app//app.bundle.js"></script>
</body>

</html>
