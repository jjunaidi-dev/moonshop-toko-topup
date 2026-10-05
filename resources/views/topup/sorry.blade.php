<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Belum Tersedia - MoonShop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex items-center justify-center p-4 md:p-10">

    <!-- Container Utama Split Screen -->
    <div class="max-w-5xl w-full bg-white rounded-3xl shadow-xl overflow-hidden grid grid-cols-1 md:grid-cols-12 min-h-[600px]">
        
        <!-- Sisi Kiri (Biru / Brand Sidebar) -->
        <div class="md:col-span-5 bg-blue-600 text-white p-8 md:p-12 flex flex-col justify-between relative overflow-hidden">
            
            <!-- Logo & Brand Name -->
            <div class="z-10">
                <div class="flex items-center gap-2 mb-12">
                    <!-- Icon Moon -->
                    <div class="w-8 h-8 rounded-full border-2 border-white flex items-center justify-center">
                        <svg class="w-4 h-4 text-white fill-current" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                    </div>
                    <span class="font-bold text-lg tracking-wider">MOONSHOP</span>
                </div>

                <!-- Headline & Deskripsi -->
                <h1 class="text-3xl md:text-4xl font-bold leading-tight mb-4">
                    Pilihan Game Sedang Disiapkan
                </h1>
                <p class="text-blue-100 text-sm leading-relaxed">
                    Kami terus memperluas katalog layanan top up untuk memberikan pengalaman terbaik dan terbanyak bagi kamu.
                </p>
            </div>

            <!-- Card Info / Status -->
            <div class="z-10 mt-8">
                <div class="bg-blue-700/60 backdrop-blur-sm border border-blue-400/30 rounded-2xl p-5">
                    <div class="flex items-center gap-2 text-yellow-300 mb-2">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-sm font-semibold">Segera Hadir</span>
                    </div>
                    <p class="text-xs text-blue-100 leading-relaxed">
                        Tim kami sedang melakukan integrasi sistem agar proses transaksi game ini dapat berjalan otomatis dan instan 24/7.
                    </p>
                </div>

                <!-- Indicator Dots -->
                <div class="flex justify-center gap-1.5 mt-6">
                    <span class="w-2 h-2 rounded-full bg-white opacity-40"></span>
                    <span class="w-2 h-2 rounded-full bg-white"></span>
                    <span class="w-2 h-2 rounded-full bg-white opacity-40"></span>
                </div>
            </div>

        </div>

        <!-- Sisi Kanan (Pesan Maaf & Aksi) -->
        <div class="md:col-span-7 p-8 md:p-12 flex flex-col justify-between items-center text-center">
            
            <div class="my-auto max-w-md">
                <!-- Icon Illustration (Controller / Construction) -->
                <div class="w-20 h-20 bg-blue-50 text-blue-600 rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-sm border border-blue-100">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 002 2h14a2 2 0 002-2V7a2 2 0 00-2-2H5zM5 14a2 2 0 00-2 2v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 00-2-2H5z"></path>
                    </svg>
                </div>

                <!-- Title & Pesan Maaf -->
                <h2 class="text-2xl font-bold text-gray-900 mb-3">Mohon Maaf, Game Belum Tersedia</h2>
                <p class="text-gray-500 text-sm leading-relaxed mb-8">
                    Layanan top up untuk game ini saat ini belum tersedia di MoonShop. Kami sedang bekerja keras dan akan segera menghadirkan game ini dalam beberapa waktu lagi!
                </p>

                <!-- Action Buttons -->
                <div class="space-y-3">
                    <a href="/" 
                       class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3.5 px-6 rounded-xl shadow-lg shadow-blue-500/30 transition duration-200 flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        <span>Kembali ke Beranda</span>
                    </a>

                    <a href="/games" 
                       class="w-full bg-gray-50 hover:bg-gray-100 text-gray-700 font-semibold py-3.5 px-6 rounded-xl border border-gray-200 transition duration-200 block text-sm">
                        Lihat Game Lain yang Tersedia
                    </a>
                </div>
            </div>

            <!-- Footer Info -->
            <p class="text-xs text-gray-400 mt-6">
                Ingin game favoritmu cepat rilis? <a href="#" class="text-blue-600 font-medium hover:underline">Beri tahu kami</a>
            </p>

        </div>
    </div>

</body>
</html>