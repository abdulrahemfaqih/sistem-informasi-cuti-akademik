<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sicuti | Login</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-8 space-y-8 bg-white rounded-lg shadow-lg">
        <!-- Error Messages -->
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @error('login_failed')
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                <p>{{ $message }}</p>
            </div>
        @enderror

        <div class="flex flex-col items-center">
            <!-- Logo Placeholder -->
            <img src="https://flowbite-admin-dashboard.vercel.app/images/logo.svg" alt="Sicuti Logo"
                class="w-16 h-16 mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Sicuti</h2>
            <p class="text-gray-500">Sign in to platform</p>
        </div>

        <form action="{{ route('login') }}" method="POST" class="mt-6 space-y-4">
            @csrf
            <!-- Username Field -->
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Your username</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}"
                    class="w-full px-4 py-2 mt-1 border rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('username') border-red-500 @enderror"
                    placeholder="your username" required>
                @error('username')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Field -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Your password</label>
                <div class="relative">
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="w-full px-4 py-2 mt-1 border rounded-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('password') border-red-500 @enderror"
                        placeholder="••••••••"
                        required
                    >
                    <button
                        type="button"
                        onclick="togglePassword()"
                        class="absolute inset-y-0 right-0 flex items-center pr-3 mt-1 text-gray-600 cursor-pointer hover:text-gray-800"
                    >
                        <!-- Eye Icon (Show Password) -->
                        <svg id="showPassword" class="w-5 h-5 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <!-- Eye Slash Icon (Hide Password) -->
                        <svg id="hidePassword" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>
                    </button>
                </div>
                @error('password')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me Checkbox -->
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember_me" name="remember_me" type="checkbox"
                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <label for="remember_me" class="ml-2 text-sm text-gray-600">Remember me</label>
                </div>

                <div>
                    <a href="#" class="text-sm text-blue-600 hover:underline">Lost Password?</a>
                </div>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="w-full px-4 py-2 font-semibold text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Login to your account
                </button>
            </div>

            <!-- Register Link -->
            <p class="text-sm text-center text-gray-600">
                Not registered? <a href="/register" class="text-blue-600 hover:underline">Create account</a>
            </p>
        </form>
    </div>
     <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const showPasswordIcon = document.getElementById('showPassword');
            const hidePasswordIcon = document.getElementById('hidePassword');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                showPasswordIcon.classList.remove('hidden');
                hidePasswordIcon.classList.add('hidden');
            } else {
                passwordInput.type = 'password';
                showPasswordIcon.classList.add('hidden');
                hidePasswordIcon.classList.remove('hidden');
            }
        }
    </script>
</body>

</html>
