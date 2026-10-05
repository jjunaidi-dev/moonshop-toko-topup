<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Top Up - MoonShop</title>
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
                    <!-- Icon Moon (Bulan) -->
                    <div class="w-8 h-8 rounded-full border-2 border-white flex items-center justify-center">
                        <svg class="w-4 h-4 text-white fill-current" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                    </div>
                    <span class="font-bold text-lg tracking-wider">MOONSHOP</span>
                </div>

                <!-- Headline & Deskripsi -->
                <h1 class="text-3xl md:text-4xl font-bold leading-tight mb-4">
                    Top Up Diamond Mobile Legends
                </h1>
                <p class="text-blue-100 text-sm leading-relaxed">
                    Layanan top up game cepat, aman, dan terpercaya. Masukkan ID akun Anda dan pilih paket diamond yang diinginkan.
                </p>
            </div>

            <!-- Card Testimonial / Highlight Info -->
            <div class="z-10 mt-8">
                <div class="bg-blue-700/60 backdrop-blur-sm border border-blue-400/30 rounded-2xl p-5">
                    <p class="text-sm font-semibold mb-2">Proses Otomatis 24/7</p>
                    <p class="text-xs text-blue-100 mb-4 leading-relaxed">
                        Diamond langsung masuk ke akun Mobile Legends kamu dalam hitungan detik setelah pembayaran berhasil dikonfirmasi.
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 bg-blue-400 rounded-full flex items-center justify-center text-xs font-bold text-blue-900">
                                ML
                            </div>
                            <span class="text-xs font-medium">Official TopUp</span>
                        </div>
                        <!-- Stars -->
                        <div class="flex text-yellow-300 text-xs">
                            ★★★★★
                        </div>
                    </div>
                </div>

                <!-- Slider Indicators -->
                <div class="flex justify-center gap-1.5 mt-6">
                    <span class="w-2 h-2 rounded-full bg-white opacity-40"></span>
                    <span class="w-2 h-2 rounded-full bg-white"></span>
                    <span class="w-2 h-2 rounded-full bg-white opacity-40"></span>
                </div>
            </div>

        </div>

        <!-- Sisi Kanan (Form Area) -->
        <div class="md:col-span-7 p-8 md:p-12 flex flex-col justify-between">
            
            <div>
                <!-- Progress Line / Step Indicator -->
                <div class="flex items-center justify-between mb-10 px-4">
                    <div class="w-3 h-3 rounded-full border-2 border-blue-600 bg-white"></div>
                    <div class="h-0.5 flex-1 bg-gray-200 mx-2"></div>
                    <div class="w-2 h-2 rounded-full bg-gray-300"></div>
                    <div class="h-0.5 flex-1 bg-gray-200 mx-2"></div>
                    <div class="w-2 h-2 rounded-full bg-gray-300"></div>
                    <div class="h-0.5 flex-1 bg-gray-200 mx-2"></div>
                    <div class="w-2 h-2 rounded-full bg-gray-300"></div>
                </div>

                <!-- Title Form -->
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Informasi Pesanan</h2>

                <!-- Form Start -->
                <form action="{{ route('topup.payment.process') }}" method="POST" class="space-y-5">
                    @csrf
                    <input type="hidden" name="game_name" value="Mobile Legends">

                    <!-- User ID & Zone ID Grid -->
                    <div class="grid grid-cols-12 gap-3">
                        <div class="col-span-8">
                            <label class="block text-xs font-semibold text-gray-500 mb-1.5">User ID</label>
                            <input type="text" 
                                   name="user_id" 
                                   placeholder="Contoh: 12345678" 
                                   required 
                                   class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-blue-600 focus:ring-1 focus:ring-blue-600 transition">
                        </div>
                        <div class="col-span-4">
                            <label class="block text-xs font-semibold text-gray-500 mb-1.5">Zone ID</label>
                            <input type="text" 
                                   name="zone_id" 
                                   placeholder="(1234)" 
                                   required 
                                   class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-blue-600 focus:ring-1 focus:ring-blue-600 transition">
                        </div>
                    </div>

                    <!-- Select Package -->
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 mb-1.5">Pilih Paket Diamond</label>
                        <div class="relative">
                            <select name="package_name" 
                                    id="package_select" 
                                    onchange="updatePrice()" 
                                    class="w-full appearance-none bg-white border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-700 focus:outline-none focus:border-blue-600 focus:ring-1 focus:ring-blue-600 transition cursor-pointer" 
                                    required>
                                <option value="86 Diamonds" data-price="20000">86 Diamonds - Rp 20.000</option>
                                <option value="172 Diamonds" data-price="40000">172 Diamonds - Rp 40.000</option>
                                <option value="257 Diamonds" data-price="60000">257 Diamonds - Rp 60.000</option>
                            </select>
                            <!-- Custom Arrow Icon -->
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-400">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Hidden Input Total Price -->
                    <input type="hidden" name="total_price" id="total_price" value="20000">

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit" 
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3.5 px-6 rounded-xl shadow-lg shadow-blue-500/30 transition duration-200 flex items-center justify-center gap-2">
                            <span>LANJUT KE PEMBAYARAN</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- Script JavaScript (Tetap Sesuai Aslinya) -->
    <script>
        function updatePrice() {
            const select = document.getElementById('package_select');
            const selectedOption = select.options[select.selectedIndex];
            document.getElementById('total_price').value = selectedOption.getAttribute('data-price');
        }
    </script>
</body>
</html>