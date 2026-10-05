<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin - MoonShop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-[#F3F4F8] min-h-screen flex items-center justify-center p-4 md:p-6">

    <div class="bg-white rounded-3xl shadow-xl w-full max-w-5xl overflow-hidden grid grid-cols-1 md:grid-cols-2 p-3 gap-4">

        <!-- Sisi Kiri: Banner Hero -->
        <div class="relative bg-gradient-to-br from-indigo-600 via-blue-600 to-cyan-500 rounded-2xl p-8 md:p-12 flex flex-col justify-between text-white overflow-hidden min-h-[400px] md:min-h-[580px]">
            <div class="absolute -top-12 -left-12 w-64 h-64 bg-cyan-400/30 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-12 -right-12 w-64 h-64 bg-indigo-900/40 rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative z-10 space-y-3">
                <span class="text-xs font-semibold tracking-wider uppercase text-cyan-200">Join Admin Team</span>
                <h1 class="text-3xl md:text-4xl font-extrabold leading-snug">
                    Get Started Now<br>with MoonShop
                </h1>
            </div>

            <div class="relative z-10 pt-10">
                <p class="text-xs text-blue-200 font-medium mb-3">System Features</p>
                <div class="flex flex-wrap items-center gap-4 text-xs font-semibold text-white/80">
                    <span>• TopUp Direct</span>
                    <span>• Real-time Analytics</span>
                    <span>• Transaction Logs</span>
                </div>
            </div>
        </div>

        <!-- Sisi Kanan: Form Register Admin -->
        <div class="flex flex-col justify-center p-6 md:p-10">
            <div class="mb-6">
                <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900 tracking-tight">Create Admin Account</h2>
                <p class="text-xs text-gray-400 mt-1">Please fill in your details to register.</p>
            </div>

            @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-600 text-xs rounded-xl p-3 mb-4 space-y-1">
                @foreach($errors->all() as $error)
                <p>• {{ $error }}</p>
                @endforeach
            </div>
            @endif

            <form action="{{ route('admin.register.submit') }}" method="POST" class="space-y-3">
                @csrf
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter your name..." required
                        class="w-full px-4 py-2.5 text-xs rounded-xl border border-gray-200 focus:outline-none focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 transition bg-gray-50/50">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Email address</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="workmail@gmail.com" required
                        class="w-full px-4 py-2.5 text-xs rounded-xl border border-gray-200 focus:outline-none focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 transition bg-gray-50/50">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" placeholder="••••••••••••" required
                        class="w-full px-4 py-2.5 text-xs rounded-xl border border-gray-200 focus:outline-none focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 transition bg-gray-50/50">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Confirm Password</label>
                    <input type="password" name="password_confirmation" placeholder="••••••••••••" required
                        class="w-full px-4 py-2.5 text-xs rounded-xl border border-gray-200 focus:outline-none focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 transition bg-gray-50/50">
                </div>

                <button type="submit" class="w-full mt-2 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-xs rounded-xl transition shadow-lg shadow-indigo-200 active:scale-[0.99]">
                    Sign Up
                </button>
            </form>

            <p class="text-xs text-center text-gray-500 mt-6">
                Sudah punya akun?
                <a href="{{ route('admin.login') }}" class="text-indigo-600 font-bold hover:underline">Log in</a>
            </p>
        </div>

    </div>

</body>

</html>