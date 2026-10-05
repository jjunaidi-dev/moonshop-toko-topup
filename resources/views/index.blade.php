<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="{{ asset('img/favicon_moonshop.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <title>MoonShop - Top Up Game Mobile Terpercaya</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .glow-effect {
            box-shadow: 0 4px 20px rgba(6, 182, 212, 0.15);
        }

        .glow-effect:hover {
            box-shadow: 0 6px 25px rgba(6, 182, 212, 0.25);
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 font-sans antialiased min-h-screen flex flex-col justify-between">

    <!-- NAVBAR FULL-WIDTH STICKY -->
    <nav class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-gray-100 shadow-sm transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3.5">
            <div class="flex items-center justify-between gap-4">

                <!-- Brand Logo -->
                <a href="#" class="flex items-center gap-2.5 text-xl font-bold tracking-tight text-gray-900">
                    <span class="flex-shrink-0">
                        <img src="img/moonshop_logo2.png" alt="MoonShop Logo" class="h-8 w-8 object-contain" />
                    </span>
                    <div>
                        <span class="text-indigo-600 font-extrabold">MOON</span><span class="font-bold">SHOP</span>
                    </div>
                </a>

                <!-- Nav Links (Desktop) -->
                <div class="hidden lg:flex items-center gap-8 text-sm font-medium">
                    <!-- Link Aktif dengan garis bawah mengambang -->
                    <a href="#" class="relative text-indigo-600 font-semibold py-1 after:absolute after:bottom-[-4px] after:left-0 after:w-full after:h-[2px] after:bg-indigo-600 after:rounded-full">Home</a>
                    <a href="#games" class="text-gray-600 hover:text-indigo-600 transition py-1">Game Mobile</a>
                    <a href="#promo" class="text-gray-600 hover:text-indigo-600 transition py-1">Promo</a>
                    <a href="#komunitas" class="text-gray-600 hover:text-indigo-600 transition py-1">Komunitas</a>
                    <a href="#bantuan" class="text-gray-600 hover:text-indigo-600 transition py-1">Layanan</a>
                </div>

                <!-- Search & User Actions -->
                <div class="flex items-center gap-3">
                    <!-- Input Pencarian -->
                    <div class="relative hidden md:block w-44 lg:w-56">
                        <input type="text" placeholder="Cari Game / Diamond..."
                            class="w-full bg-gray-50 text-xs text-gray-800 rounded-lg pl-9 pr-4 py-2 border border-gray-200 focus:outline-none focus:border-indigo-500 focus:bg-white transition">
                        <i class="fa-solid fa-magnifying-glass absolute left-3 top-2.5 text-gray-400 text-xs"></i>
                    </div>

                    <!-- Tombol Notifikasi -->
                    <button class="p-2 text-gray-500 hover:text-indigo-600 bg-gray-50 hover:bg-gray-100 rounded-lg w-9 h-9 flex items-center justify-center border border-gray-200/60 transition">
                        <i class="fa-regular fa-bell text-xs"></i>
                    </button>

                    <!-- Tombol Keranjang -->
                    <button class="p-2 text-gray-500 hover:text-indigo-600 bg-gray-50 hover:bg-gray-100 rounded-lg w-9 h-9 flex items-center justify-center border border-gray-200/60 transition">
                        <i class="fa-solid fa-cart-shopping text-xs"></i>
                    </button>

                    @auth('customer')
                    <!-- KONDISI KETIKA SUDAH LOGIN -->
                    <div class="relative group">
                        <button class="flex items-center gap-2.5 px-3 py-1.5 bg-gray-50 hover:bg-gray-100 text-gray-800 font-medium text-xs rounded-lg border border-gray-200/80 transition">
                            <div class="w-6 h-6 rounded-md bg-indigo-600 flex items-center justify-center text-white text-[10px] font-bold">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <span>{{ Auth::guard('customer')->user()->first_name }}</span>
                            <i class="fa-solid fa-chevron-down text-[10px] text-gray-400"></i>
                        </button>

                        <!-- Menu Dropdown -->
                        <div class="absolute right-0 mt-2 w-48 bg-white border border-gray-100 rounded-xl shadow-xl py-2 hidden group-hover:block z-50">
                            <div class="px-4 py-2 border-b border-gray-100">
                                <p class="text-[10px] text-gray-400">Login sebagai</p>
                                <p class="text-xs text-gray-900 font-semibold truncate">{{ Auth::guard('customer')->user()->email }}</p>
                            </div>

                            <a href="/dashboard" class="w-full text-left px-4 py-2 text-xs text-gray-700 hover:text-indigo-600 hover:bg-gray-50 flex items-center gap-2 transition border-b border-gray-100">
                                <i class="fa-solid fa-gauge text-indigo-600"></i>
                                <span>Dashboard</span>
                            </a>

                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-xs text-red-600 hover:bg-red-50 flex items-center gap-2 transition">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                    <span>Keluar / Logout</span>
                                </button>
                            </form>
                        </div>
                    </div>
                    @else
                    <!-- KONDISI KETIKA BELUM LOGIN (Gaya Tombol 'Get Started') -->
                    <a href="{{ route('login') }}"
                        class="flex items-center justify-center px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-xs rounded-lg transition shadow-sm shadow-indigo-500/20">
                        <span>Masuk</span>
                    </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- MOBILE BOTTOM NAVIGATION (Native App Style) -->
    <nav class="fixed bottom-3 left-4 right-4 z-50 lg:hidden">
        <div class="max-w-md mx-auto bg-white/90 backdrop-blur-lg border border-gray-100 rounded-3xl shadow-2xl shadow-indigo-950/10 px-3 py-2">
            <div class="flex items-center justify-around">

                <!-- 1. Home (Kondisi Aktif) -->
                <a href="#" class="flex flex-col items-center group relative py-1 px-3">
                    <!-- Soft Glow Pill Background untuk Menu Aktif -->
                    <div class="absolute inset-0 bg-indigo-50 rounded-2xl -z-10 scale-100 transition-all duration-300"></div>

                    <!-- Indikator Dots Kecil di Atas -->
                    <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full mb-1"></span>

                    <!-- Icon Lucide dengan Stroke Tebal App-Style -->
                    <i data-lucide="home" class="w-5 h-5 text-indigo-600 stroke-[2.2] transition-transform duration-200 active:scale-95"></i>

                    <!-- Label Text -->
                    <span class="text-[10px] font-bold text-indigo-600 tracking-tight mt-0.5">Home</span>
                </a>

                <!-- 2. Game Mobile -->
                <a href="#games" class="flex flex-col items-center group relative py-1 px-3 text-gray-400 hover:text-indigo-600 transition-all duration-200">
                    <span class="w-1.5 h-1.5 bg-transparent rounded-full mb-1"></span>
                    <i data-lucide="gamepad-2" class="w-5 h-5 stroke-[1.8] transition-transform duration-200 group-active:scale-90 group-hover:-translate-y-0.5"></i>
                    <span class="text-[10px] font-medium tracking-tight mt-0.5">Games</span>
                </a>

                <!-- 3. Promo (Gaya Aksen Special Tag) -->
                <a href="#promo" class="flex flex-col items-center group relative py-1 px-3 text-gray-400 hover:text-indigo-600 transition-all duration-200">
                    <span class="w-1.5 h-1.5 bg-transparent rounded-full mb-1"></span>
                    <i data-lucide="ticket" class="w-5 h-5 stroke-[1.8] transition-transform duration-200 group-active:scale-90 group-hover:-translate-y-0.5"></i>
                    <span class="text-[10px] font-medium tracking-tight mt-0.5">Promo</span>
                </a>

                <!-- 4. Komunitas -->
                <a href="#komunitas" class="flex flex-col items-center group relative py-1 px-3 text-gray-400 hover:text-indigo-600 transition-all duration-200">
                    <span class="w-1.5 h-1.5 bg-transparent rounded-full mb-1"></span>
                    <i data-lucide="users" class="w-5 h-5 stroke-[1.8] transition-transform duration-200 group-active:scale-90 group-hover:-translate-y-0.5"></i>
                    <span class="text-[10px] font-medium tracking-tight mt-0.5">Komunitas</span>
                </a>

                <!-- 5. Layanan -->
                <a href="#bantuan" class="flex flex-col items-center group relative py-1 px-3 text-gray-400 hover:text-indigo-600 transition-all duration-200">
                    <span class="w-1.5 h-1.5 bg-transparent rounded-full mb-1"></span>
                    <i data-lucide="headset" class="w-5 h-5 stroke-[1.8] transition-transform duration-200 group-active:scale-90 group-hover:-translate-y-0.5"></i>
                    <span class="text-[10px] font-medium tracking-tight mt-0.5">Layanan</span>
                </a>

            </div>
        </div>
    </nav>
    <!-- MAIN CONTENT -->
    <main class="max-w-7xl mx-auto px-4 lg:px-8 py-6 space-y-10 w-full">

        <!-- HERO BANNER (Mobile Legends Special - LIGHT THEME) -->
        <section
            class="relative rounded-2xl overflow-hidden bg-gradient-to-r from-sky-50 via-white to-cyan-50 border border-cyan-100 p-6 md:p-12 min-h-[480px] flex items-center shadow-lg">
            <!-- Background Image -->
            <div class="absolute inset-0 z-0">
                <img
                    src="img/hero_moonshop.jpg"
                    alt="Mobile Legends Background"
                    class="w-full h-full object-cover object-center md:object-right opacity-80" />
                <!-- Light Gradient Overlay -->
                <div
                    class="absolute inset-0 bg-gradient-to-r from-gray-50 via-gray-50/95 to-transparent"></div>
            </div>

            <!-- Content Container (Left Aligned) -->
            <div class="relative z-10 max-w-xl space-y-5">
                <!-- Subtitle/Badge -->
                <span
                    class="inline-block px-3.5 py-1 bg-cyan-100/90 border border-cyan-300 rounded-full text-cyan-700 text-xs font-bold uppercase tracking-wider shadow-sm">
                    <i class="fa-solid fa-bolt me-1 text-cyan-600"></i> Special Top Up MLBB
                </span>

                <!-- Main Title -->
                <h1
                    class="text-4xl md:text-6xl font-extrabold tracking-tighter text-gray-900 leading-none">
                    MOBILE LEGENDS:<br />
                    <span class="bg-gradient-to-r from-cyan-600 to-blue-600 bg-clip-text text-transparent">BANG BANG</span>
                </h1>

                <!-- Description -->
                <p class="text-gray-600 text-base md:text-lg leading-relaxed max-w-md font-medium">
                    Dapatkan bonus Diamond hingga 20% dan diskon Weekly Diamond Pass hari ini!
                    Proses instan 24 jam legal & aman.
                </p>

                <!-- Buttons -->
                <div class="flex flex-wrap gap-4 pt-3">
                    <a
                        href="#mlbb-section"
                        class="px-8 py-3 bg-gradient-to-r from-orange-500 to-amber-500 hover:from-orange-600 hover:to-amber-600 text-white font-black rounded-full text-sm uppercase tracking-wider shadow-md shadow-orange-500/20 transition transform hover:-translate-y-0.5">
                        Top Up Sekarang
                    </a>
                    <a
                        href="#promo"
                        class="px-8 py-3 bg-white/80 hover:bg-white text-cyan-600 font-bold rounded-full text-sm border-2 border-cyan-500 shadow-sm transition">
                        Lihat Promo
                    </a>
                </div>
            </div>

            <!-- Slider Navigation -->
            <button
                class="absolute left-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 flex items-center justify-center rounded-full bg-white/80 hover:bg-white border border-gray-200 text-gray-700 shadow-md transition">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <button
                class="absolute right-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 flex items-center justify-center rounded-full bg-white/80 hover:bg-white border border-gray-200 text-gray-700 shadow-md transition">
                <i class="fa-solid fa-chevron-right"></i>
            </button>

            <!-- Pagination Dots -->
            <div
                class="absolute bottom-6 left-1/2 -translate-x-1/2 z-20 flex gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-cyan-600"></span>
                <span class="w-2.5 h-2.5 rounded-full bg-gray-300"></span>
                <span class="w-2.5 h-2.5 rounded-full bg-gray-300"></span>
            </div>
        </section>

        <!-- FEATURED GAMES -->
        <section id="games" class="space-y-4">
            <div class="flex items-center justify-between">
                <h2
                    class="text-lg md:text-xl font-bold tracking-wide text-gray-900 uppercase border-l-4 border-cyan-500 pl-3">
                    Game Populer
                </h2>
                <div class="flex gap-2">
                    <button
                        class="w-8 h-8 rounded-lg bg-white border border-gray-200 text-gray-500 hover:text-gray-900 hover:bg-gray-50 flex items-center justify-center shadow-sm"><i
                            class="fa-solid fa-chevron-left text-xs"></i></button>
                    <button
                        class="w-8 h-8 rounded-lg bg-white border border-gray-200 text-gray-500 hover:text-gray-900 hover:bg-gray-50 flex items-center justify-center shadow-sm"><i
                            class="fa-solid fa-chevron-right text-xs"></i></button>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                <!-- MLBB Main Card -->
                <div
                    class="bg-white rounded-xl p-4 border border-cyan-500/40 glow-effect transition duration-300 flex flex-col justify-between shadow-sm">
                    <div>
                        <div class="relative h-44 rounded-lg overflow-hidden mb-3 bg-gray-100">
                            <img src="img/mlbb_icon.webp"
                                alt="Mobile Legends" class="w-full h-full object-cover">
                            <span
                                class="absolute top-2 right-2 bg-orange-500 text-white font-black text-[10px] px-2 py-0.5 rounded uppercase shadow">HOT</span>
                        </div>
                        <h3 class="font-bold text-gray-900 text-base">Mobile Legends</h3>
                        <p class="text-xs text-gray-500 mb-2">Moonton • Instant</p>
                        <div class="flex items-center gap-1 text-amber-400 text-xs mb-4">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i>
                            <span class="text-gray-500 text-[11px] ml-1">4.9</span>
                        </div>
                    </div>
                    <a href="/checkout/mlbb"
                        class="w-full py-2 bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-600 hover:to-blue-700 text-white text-xs font-bold rounded-lg text-center transition shadow-sm">TOP
                        UP</a>
                </div>

                <!-- Game 2 -->
                <div
                    class="bg-white rounded-xl p-4 border border-gray-200 hover:border-gray-300 shadow-sm transition duration-300 flex flex-col justify-between">
                    <div>
                        <div class="relative h-44 rounded-lg overflow-hidden mb-3 bg-gray-100">
                            <img src="img/ff_icon.webp"
                                alt="Free Fire" class="w-full h-full object-cover">
                        </div>
                        <h3 class="font-bold text-gray-900 text-base">Free Fire</h3>
                        <p class="text-xs text-gray-500 mb-2">Garena • Instant</p>
                        <div class="flex items-center gap-1 text-amber-400 text-xs mb-4">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                class="fa-regular fa-star"></i>
                            <span class="text-gray-500 text-[11px] ml-1">4.8</span>
                        </div>
                    </div>
                    <a href="/checkout/ff">
                        <button
                            class="w-full py-2 bg-gray-100 hover:bg-gray-200 text-cyan-600 text-xs font-bold rounded-lg transition border border-gray-200">TOP
                            UP</button>
                    </a>
                </div>

                <!-- Game 3 -->
                <div
                    class="bg-white rounded-xl p-4 border border-gray-200 hover:border-gray-300 shadow-sm transition duration-300 flex flex-col justify-between">
                    <div>
                        <div class="relative h-44 rounded-lg overflow-hidden mb-3 bg-gray-100">
                            <img src="img/genshin_icon.webp"
                                alt="Genshin Impact" class="w-full h-full object-cover">
                        </div>
                        <h3 class="font-bold text-gray-900 text-base">Genshin Impact</h3>
                        <p class="text-xs text-gray-500 mb-2">HoYoverse • Instant</p>
                        <div class="flex items-center gap-1 text-amber-400 text-xs mb-4">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i>
                            <span class="text-gray-500 text-[11px] ml-1">4.9</span>
                        </div>
                    </div>
                    <a href="/checkout/genshin">
                        <button
                            class="w-full py-2 bg-gray-100 hover:bg-gray-200 text-cyan-600 text-xs font-bold rounded-lg transition border border-gray-200">TOP
                            UP</button>
                    </a>
                </div>

                <!-- Game 4 -->
                <div
                    class="bg-white rounded-xl p-4 border border-gray-200 hover:border-gray-300 shadow-sm transition duration-300 flex flex-col justify-between">
                    <div>
                        <div class="relative h-44 rounded-lg overflow-hidden mb-3 bg-gray-100">
                            <img src="img/PUBG_icon.webp"
                                alt="PUBG Mobile" class="w-full h-full object-cover">
                        </div>
                        <h3 class="font-bold text-gray-900 text-base">PUBG Mobile</h3>
                        <p class="text-xs text-gray-500 mb-2">Tencent • Instant</p>
                        <div class="flex items-center gap-1 text-amber-400 text-xs mb-4">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star-half-stroke"></i>
                            <span class="text-gray-500 text-[11px] ml-1">4.7</span>
                        </div>
                    </div>
                    <a href="/checkout/pubg">
                        <button
                            class="w-full py-2 bg-gray-100 hover:bg-gray-200 text-cyan-600 text-xs font-bold rounded-lg transition border border-gray-200">TOP
                            UP</button>
                    </a>
                </div>
            </div>
        </section>

        <!-- MLBB DIAMOND PACKAGES -->
        <section id="mlbb-section" class="space-y-4 pt-4">
            <div class="flex items-center justify-between">
                <h2
                    class="text-lg md:text-xl font-bold tracking-wide text-gray-900 uppercase border-l-4 border-amber-500 pl-3">
                    Paket Populer Mobile Legends
                </h2>
                <span class="text-xs text-cyan-600 font-semibold">Proses Otomatis 1-3 Detik</span>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-3">
                <!-- Package Item -->
                <div
                    class="bg-white hover:bg-gray-50 p-4 rounded-xl border border-gray-200 hover:border-cyan-500 cursor-pointer transition text-center group shadow-sm">
                    <i
                        class="fa-solid fa-gem text-cyan-500 text-2xl mb-2 group-hover:scale-110 transition transform"></i>
                    <h4 class="text-sm font-bold text-gray-900">86 Diamonds</h4>
                    <p class="text-[11px] text-gray-500">78 + 8 Bonus</p>
                    <p class="text-xs font-black text-amber-600 mt-2">Rp 20.000</p>
                </div>

                <!-- Package Item -->
                <div
                    class="bg-cyan-50/50 hover:bg-cyan-50 p-4 rounded-xl border border-cyan-400 cursor-pointer transition text-center group relative overflow-hidden shadow-sm">
                    <span
                        class="absolute top-0 right-0 bg-cyan-500 text-white font-bold text-[9px] px-1.5 py-0.5 rounded-bl">BEST</span>
                    <i
                        class="fa-solid fa-gem text-cyan-600 text-2xl mb-2 group-hover:scale-110 transition transform"></i>
                    <h4 class="text-sm font-bold text-gray-900">172 Diamonds</h4>
                    <p class="text-[11px] text-gray-500">156 + 16 Bonus</p>
                    <p class="text-xs font-black text-amber-600 mt-2">Rp 40.000</p>
                </div>

                <!-- Package Item -->
                <div
                    class="bg-white hover:bg-gray-50 p-4 rounded-xl border border-gray-200 hover:border-cyan-500 cursor-pointer transition text-center group shadow-sm">
                    <i
                        class="fa-solid fa-gem text-cyan-500 text-2xl mb-2 group-hover:scale-110 transition transform"></i>
                    <h4 class="text-sm font-bold text-gray-900">257 Diamonds</h4>
                    <p class="text-[11px] text-gray-500">234 + 23 Bonus</p>
                    <p class="text-xs font-black text-amber-600 mt-2">Rp 60.000</p>
                </div>

                <!-- Package Item -->
                <div
                    class="bg-amber-50/50 hover:bg-amber-50 p-4 rounded-xl border border-amber-400 cursor-pointer transition text-center group relative overflow-hidden shadow-sm">
                    <span
                        class="absolute top-0 right-0 bg-amber-500 text-white font-bold text-[9px] px-1.5 py-0.5 rounded-bl">PROMO</span>
                    <i
                        class="fa-solid fa-id-card text-amber-500 text-2xl mb-2 group-hover:scale-110 transition transform"></i>
                    <h4 class="text-sm font-bold text-gray-900">Weekly Pass</h4>
                    <p class="text-[11px] text-gray-500">7 Hari Hemat</p>
                    <p class="text-xs font-black text-amber-600 mt-2">Rp 27.500</p>
                </div>

                <!-- Package Item -->
                <div
                    class="bg-white hover:bg-gray-50 p-4 rounded-xl border border-gray-200 hover:border-cyan-500 cursor-pointer transition text-center group shadow-sm">
                    <i
                        class="fa-solid fa-gem text-cyan-500 text-2xl mb-2 group-hover:scale-110 transition transform"></i>
                    <h4 class="text-sm font-bold text-gray-900">706 Diamonds</h4>
                    <p class="text-[11px] text-gray-500">625 + 81 Bonus</p>
                    <p class="text-xs font-black text-amber-600 mt-2">Rp 160.000</p>
                </div>
            </div>
        </section>

        <!-- COMMUNITY HUB & TOP LEADERBOARD -->
        <section id="komunitas" class="space-y-4 pt-4">
            <h2 class="text-lg md:text-xl font-bold tracking-wide text-gray-900 uppercase border-l-4 border-cyan-500 pl-3">
                Komunitas & Youtube
            </h2>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <!-- Recent Orders -->
                <div class="bg-white rounded-xl p-4 border border-gray-200 shadow-sm space-y-3">
                    <div class="flex justify-between items-center border-b border-gray-100 pb-2">
                        <h3 class="text-xs font-bold uppercase text-gray-700"><i
                                class="fa-solid fa-list-check me-2 text-cyan-600"></i>Transaksi Terakhir</h3>
                        <span class="text-[10px] text-gray-400">Real-time</span>
                    </div>
                    <div class="space-y-2 text-xs">
                        <div class="flex items-center justify-between p-2 rounded bg-gray-50 border border-gray-100">
                            <div>
                                <p class="font-bold text-gray-800">User ID 12849***</p>
                                <p class="text-[10px] text-gray-500">Mobile Legends • 257 Diamond</p>
                            </div>
                            <span
                                class="text-[10px] bg-emerald-50 text-emerald-600 px-2 py-0.5 rounded border border-emerald-200 font-semibold">Sukses</span>
                        </div>
                        <div class="flex items-center justify-between p-2 rounded bg-gray-50 border border-gray-100">
                            <div>
                                <p class="font-bold text-gray-800">User ID 99482***</p>
                                <p class="text-[10px] text-gray-500">Weekly Diamond Pass</p>
                            </div>
                            <span
                                class="text-[10px] bg-emerald-50 text-emerald-600 px-2 py-0.5 rounded border border-emerald-200 font-semibold">Sukses</span>
                        </div>
                        <div class="flex items-center justify-between p-2 rounded bg-gray-50 border border-gray-100">
                            <div>
                                <p class="font-bold text-gray-800">User ID 44321***</p>
                                <p class="text-[10px] text-gray-500">Free Fire • 720 Diamond</p>
                            </div>
                            <span
                                class="text-[10px] bg-emerald-50 text-emerald-600 px-2 py-0.5 rounded border border-emerald-200 font-semibold">Sukses</span>
                        </div>
                    </div>
                </div>

                <!-- Live Stream MLBB -->
                <div class="bg-white rounded-xl p-4 border border-gray-200 shadow-sm space-y-3">

                    <!-- Header -->
                    <div class="flex justify-between items-center border-b border-gray-100 pb-2">
                        <h3 class="text-xs font-bold uppercase text-gray-700">
                            <i class="fa-solid fa-video me-2 text-red-500"></i>
                            Video MLBB
                        </h3>

                        <span class="text-[10px] text-gray-400">
                            VIDEO
                        </span>
                    </div>

                    <div class="space-y-3">
                        <!-- YouTube Video -->
                        <a
                            href="https://www.youtube.com/watch?v=NY460q53zW4"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="block">
                            <div class="relative h-28 rounded-lg overflow-hidden bg-gray-100 group cursor-pointer border border-gray-100">

                                <!-- YouTube Thumbnail -->
                                <img
                                    src="https://img.youtube.com/vi/NY460q53zW4/maxresdefault.jpg"
                                    alt="Video MLBB"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-300">

                                <!-- Dark Overlay -->
                                <div class="absolute inset-0 bg-black/10 group-hover:bg-black/30 transition"></div>

                                <!-- Play Button -->
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="w-10 h-10 rounded-full bg-red-600 flex items-center justify-center group-hover:scale-110 transition shadow-md">
                                        <i class="fa-solid fa-play text-white text-sm ms-0.5"></i>
                                    </div>
                                </div>

                                <!-- Bottom Info -->
                                <div class="absolute bottom-2 left-2 right-2 bg-white/90 backdrop-blur-sm p-1.5 rounded text-xs flex justify-between items-center shadow">

                                    <span class="font-bold text-gray-800 text-[11px] truncate">
                                        Season 7 Glimpse | Chrono Echoes | MCGG
                                    </span>

                                    <span class="text-[10px] text-gray-500">
                                        <i class="fa-brands fa-youtube me-1 text-red-500"></i>
                                        YouTube
                                    </span>

                                </div>

                            </div>
                        </a>

                    </div>
                </div>

                <!-- Top Spenders Leaderboard -->
                <div class="bg-white rounded-xl p-4 border border-gray-200 shadow-sm space-y-3">
                    <div class="flex justify-between items-center border-b border-gray-100 pb-2">
                        <h3 class="text-xs font-bold uppercase text-gray-700"><i
                                class="fa-solid fa-trophy me-2 text-amber-500"></i>Top Sultan Bulan Ini</h3>
                        <span class="text-[10px] text-gray-400">Update Jam 12</span>
                    </div>
                    <div class="space-y-2 text-xs">
                        <div class="flex items-center justify-between p-1.5 rounded bg-amber-50/40">
                            <div class="flex items-center gap-2">
                                <span
                                    class="w-5 h-5 rounded-full bg-amber-400 text-slate-950 font-black text-[10px] flex items-center justify-center shadow-sm">1</span>
                                <span class="font-bold text-gray-900">SultanMLBB_ID</span>
                            </div>
                            <span class="text-cyan-600 font-mono text-[11px] font-bold">125.000 DM</span>
                        </div>
                        <div class="flex items-center justify-between p-1.5">
                            <div class="flex items-center gap-2">
                                <span
                                    class="w-5 h-5 rounded-full bg-gray-200 text-gray-700 font-black text-[10px] flex items-center justify-center">2</span>
                                <span class="font-bold text-gray-700">VipGamer99</span>
                            </div>
                            <span class="text-cyan-600 font-mono text-[11px] font-bold font-bold">88.500 DM</span>
                        </div>
                        <div class="flex items-center justify-between p-1.5">
                            <div class="flex items-center gap-2">
                                <span
                                    class="w-5 h-5 rounded-full bg-amber-700 text-white font-black text-[10px] flex items-center justify-center">3</span>
                                <span class="font-bold text-gray-700">MythicKing</span>
                            </div>
                            <span class="text-cyan-600 font-mono text-[11px] font-bold">64.200 DM</span>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- NEWS & PROMO -->
        <section id="promo" class="space-y-4 pt-4">
            <h2 class="text-lg md:text-xl font-bold tracking-wide text-gray-900 uppercase border-l-4 border-cyan-500 pl-3">
                Berita & Event Promo MLBB
            </h2>

            <!-- Trik CSS: [&>div:nth-child(n+4)]:hidden memotong tampilan langsung dari div ke-4 ke atas -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 [&>div:nth-child(n+4)]:hidden">

                <!-- Berita 1 (Terbaru) -->
                <div class="bg-white rounded-xl overflow-hidden border border-gray-200 hover:border-cyan-500 transition shadow-sm">
                    <div class="h-36 bg-gray-100 relative">
                        <img src="img/berita1.jpg" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 space-y-2">
                        <span class="text-[10px] text-cyan-600 font-semibold">06 AGUSTUS 2026</span>
                        <h3 class="font-bold text-gray-900 text-sm">Dewa United Esports Umumkan Roster MPL ID Season 18</h3>
                        <p class="text-xs text-gray-500 line-clamp-2">Dewa United Esports resmi memperkenalkan susunan roster terbaru...</p>
                        <a href="#" class="inline-block text-xs text-cyan-600 font-bold pt-1 hover:underline">Baca Selengkapnya &rarr;</a>
                    </div>
                </div>

                <!-- Berita 2 -->
                <div class="bg-white rounded-xl overflow-hidden border border-gray-200 hover:border-cyan-500 transition shadow-sm">
                    <div class="h-36 bg-gray-100 relative">
                        <img src="img/berita2.jpg" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 space-y-2">
                        <span class="text-[10px] text-cyan-600 font-semibold">05 AGUSTUS 2026</span>
                        <h3 class="font-bold text-gray-900 text-sm">realme 828 Gaming Tournament 2026 Dibuka</h3>
                        <p class="text-xs text-gray-500 line-clamp-2">realme Indonesia resmi mengumumkan perayaan tahunan...</p>
                        <a href="#" class="inline-block text-xs text-cyan-600 font-bold pt-1 hover:underline">Baca Selengkapnya &rarr;</a>
                    </div>
                </div>

                <!-- Berita 3 -->
                <div class="bg-white rounded-xl overflow-hidden border border-gray-200 hover:border-cyan-500 transition shadow-sm">
                    <div class="h-36 bg-gray-100 relative">
                        <img src="img/berita3.jpg" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 space-y-2">
                        <span class="text-[10px] text-cyan-600 font-semibold">01 AGUSTUS 2026</span>
                        <h3 class="font-bold text-gray-900 text-sm">MSC 2026: Hirara dan Claude Jadi Hero Terpopuler</h3>
                        <p class="text-xs text-gray-500 line-clamp-2">MLBB Mid Season Cup (MSC) 2026 resmi berakhir...</p>
                        <a href="#" class="inline-block text-xs text-cyan-600 font-bold pt-1 hover:underline">Baca Selengkapnya &rarr;</a>
                    </div>
                </div>

                <!-- Berita 4 (Akan Otomatis Tersembunyi) -->
                <div class="bg-white rounded-xl overflow-hidden border border-gray-200 hover:border-cyan-500 transition shadow-sm">
                    <div class="h-36 bg-gray-100 relative">
                        <img src="img/berita4.jpg" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 space-y-2">
                        <span class="text-[10px] text-cyan-600 font-semibold">28 JULI 2026</span>
                        <h3 class="font-bold text-gray-900 text-sm">Berita Lama Yang Disembunyikan</h3>
                        <p class="text-xs text-gray-500 line-clamp-2">Konten berita lama...</p>
                        <a href="#" class="inline-block text-xs text-cyan-600 font-bold pt-1 hover:underline">Baca Selengkapnya &rarr;</a>
                    </div>
                </div>

            </div>

            <!-- Tombol Lihat Berita Lainnya -->
            <div class="text-center pt-2">
                <a href="halaman-semua-berita.html" class="inline-flex items-center justify-center px-5 py-2.5 text-xs font-bold text-white bg-cyan-600 hover:bg-cyan-700 active:scale-95 rounded-lg transition shadow-sm">
                    Lihat Berita Lainnya
                    <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer id="bantuan" class="bg-white border-t border-gray-200 mt-12 py-10 px-4 lg:px-8 text-xs text-gray-600">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="space-y-3">
                <a href="#" class="flex items-center gap-2 text-xl font-black tracking-wider text-gray-900">
                    <span class="p-1 bg-gradient-to-tr from-cyan-500 to-blue-600 rounded text-white text-sm">
                        <i class="fa-solid fa-moon"></i>
                    </span>
                    <span class="text-cyan-600">MOON</span>SHOP
                </a>
                <p class="text-gray-500 leading-relaxed">
                    Platform top up game murah, cepat, dan terpercaya di Indonesia. Layanan otomatis 24/7 untuk Mobile
                    Legends & Game Mobile populer.
                </p>
            </div>

            <div class="space-y-2">
                <h4 class="font-bold text-gray-900 uppercase text-sm">Navigasi</h4>
                <ul class="space-y-1.5">
                    <li><a href="#" class="hover:text-cyan-600 transition">Tentang Kami</a></li>
                    <li><a href="#" class="hover:text-cyan-600 transition">Syarat & Ketentuan</a></li>
                    <li><a href="#" class="hover:text-cyan-600 transition">Kebijakan Privasi</a></li>
                    <li><a href="#" class="hover:text-cyan-600 transition">Hubungi CS</a></li>
                </ul>
            </div>

            <div class="space-y-2">
                <h4 class="font-bold text-gray-900 uppercase text-sm">Sosial Media</h4>
                <div class="flex gap-3 text-lg text-gray-600 pt-1">
                    <a href="#" class="hover:text-cyan-600"><i class="fa-brands fa-discord"></i></a>
                    <a href="#" class="hover:text-cyan-600"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="hover:text-cyan-600"><i class="fa-brands fa-youtube"></i></a>
                    <a href="#" class="hover:text-cyan-600"><i class="fa-brands fa-tiktok"></i></a>
                </div>
            </div>

            <div class="space-y-2">
                <h4 class="font-bold text-gray-900 uppercase text-sm">Langganan Info Promo</h4>
                <div class="flex">
                    <input type="email" placeholder="Email kamu..."
                        class="bg-gray-50 border border-gray-300 rounded-l-lg px-3 py-2 text-gray-800 w-full focus:outline-none focus:border-cyan-500">
                    <button class="bg-cyan-600 hover:bg-cyan-500 text-white font-bold px-4 rounded-r-lg transition">
                        <i class="fa-solid fa-paper-plane"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto border-t border-gray-100 mt-8 pt-6 text-center text-gray-400 text-[11px]">
            &copy; 2026 MoonShop. All Rights Reserved. Mobile Legends: Bang Bang adalah merek dagang dari Moonton.
        </div>
    </footer>

    <!-- 1. Muat script Lucide dari CDN -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

    <!-- 2. Jalankan fungsi inisialisasi -->
    <script>
        lucide.createIcons();
    </script>

</body>

</html>