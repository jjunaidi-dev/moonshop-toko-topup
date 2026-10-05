<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to your account</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Font (Inter) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-100 min-h-screen flex items-center justify-center p-4 md:p-8">

    <!-- Container Utama Card -->
    <div class="w-full max-w-5xl bg-white rounded-2xl overflow-hidden shadow-xl border border-slate-200/80 grid grid-cols-1 md:grid-cols-2 p-3 gap-3">

        <!-- SISI KIRI: Hero Banner / Showcase -->
        <div class="relative rounded-xl overflow-hidden min-h-[400px] md:min-h-[580px] flex flex-col justify-between p-6 bg-cover bg-center" style="background-image: url('{{ asset('img/login_image.webp') }}');">
            <!-- Overlay Meredupkan Gambar untuk keterbacaan teks -->
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-900/30 to-transparent"></div>

            <!-- Navbar Atas Gambar -->
            <div class="relative z-10 flex items-center justify-between">
                <span class="text-white font-bold text-xl tracking-wider">LUNOX</span>
                <a href="/" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white/20 hover:bg-white/30 backdrop-blur-md text-xs font-medium text-white rounded-full border border-white/20 transition">
                    Back to website <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            <!-- Teks & Pagination Bawah Gambar -->
            <div class="relative z-10 space-y-6">
                <h2 class="text-base md:text-lg font-medium text-white leading-tight max-w-xs">
                    Sepertinya aku pernah bertemu denganmu, di salah satu mimpiku
                </h2>

                <!-- Slider Indicator / Dots -->
                <div class="flex items-center gap-1.5">
                    <span class="w-6 h-1 rounded-full bg-white/40"></span>
                    <span class="w-6 h-1 rounded-full bg-white/40"></span>
                    <span class="w-8 h-1 rounded-full bg-white"></span>
                </div>
            </div>
        </div>

        <!-- SISI KANAN: Form Sign Up / Login -->
        <div class="flex flex-col justify-center px-6 md:px-10 py-6 space-y-6">

            <!-- Title Header -->
            <div class="space-y-1">
                <h1 class="text-2xl md:text-3xl font-semibold text-slate-900 tracking-tight">Login to your account</h1>
                <p class="text-xs text-slate-500">
                    Don't have an account? <a href="{{ route('register') }}" class="text-purple-600 hover:text-purple-700 font-medium underline transition">Sign up</a>
                </p>
            </div>

            <!-- Pesan Sukses (Hasil Redirect Registrasi/Logout) -->
            @if (session('success'))
            <div class="p-3 text-xs text-emerald-700 bg-emerald-50 border border-emerald-200 rounded-lg">
                {{ session('success') }}
            </div>
            @endif

            <!-- Form Input -->
            <form action="{{ route('login.store') }}" method="POST" class="space-y-3.5">
                @csrf

                <!-- Email Input -->
                <div>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="w-full bg-slate-50 text-xs text-slate-900 placeholder-slate-400 rounded-lg px-3.5 py-3 border @error('email') border-red-500 @else border-slate-200 @enderror focus:bg-white focus:outline-none focus:border-purple-600 transition" required>
                    @error('email')
                    <p class="text-red-500 text-[10px] mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Input -->
                <div>
                    <div class="relative">
                        <input type="password" id="password" name="password" placeholder="Enter your password" class="w-full bg-slate-50 text-xs text-slate-900 placeholder-slate-400 rounded-lg pl-3.5 pr-10 py-3 border @error('password') border-red-500 @else border-slate-200 @enderror focus:bg-white focus:outline-none focus:border-purple-600 transition" required>
                        <button type="button" onclick="togglePassword()" class="absolute right-3 top-3 text-slate-400 hover:text-slate-600 text-xs">
                            <i id="eye-icon" class="fa-regular fa-eye"></i>
                        </button>
                    </div>
                    @error('password')
                    <p class="text-red-500 text-[10px] mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me Checkbox -->
                <div class="flex items-center gap-2 pt-1">
                    <input type="checkbox" name="remember" id="remember" class="w-4 h-4 rounded border-slate-300 text-purple-600 focus:ring-0 focus:ring-offset-0 cursor-pointer">
                    <label for="remember" class="text-[11px] text-slate-600 cursor-pointer select-none">
                        Remember me
                    </label>
                </div>

                <!-- Primary Submit Button -->
                <button type="submit" class="w-full py-3 bg-purple-600 hover:bg-purple-700 text-white font-medium text-xs rounded-lg transition duration-200 shadow-md shadow-purple-500/20">
                    Log in
                </button>
            </form>

            <!-- Divider -->
            <div class="relative flex py-1 items-center">
                <div class="flex-grow border-t border-slate-200"></div>
                <span class="flex-shrink mx-3 text-[10px] text-slate-400">Or login with</span>
                <div class="flex-grow border-t border-slate-200"></div>
            </div>

            <!-- Social OAuth Buttons -->
            <div class="grid grid-cols-2 gap-3">
                <a href="{{ route('google.login') }}" class="flex items-center justify-center gap-2 bg-white hover:bg-slate-50 text-slate-700 text-xs font-medium py-2.5 px-4 rounded-lg border border-slate-200 shadow-sm transition">
                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24">
                        <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                        <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                        <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z" />
                        <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z" />
                    </svg>
                    Google
                </a>
                <button type="button" class="flex items-center justify-center gap-2 bg-white hover:bg-slate-50 text-slate-700 text-xs font-medium py-2.5 px-4 rounded-lg border border-slate-200 shadow-sm transition">
                    <i class="fa-brands fa-apple text-sm text-slate-900"></i>
                    Apple
                </button>
            </div>

        </div>
    </div>

    <!-- Script Toggle Password -->
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>

</html>