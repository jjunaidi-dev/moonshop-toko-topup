<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Transaksi</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Google Fonts: Plus Jakarta Sans -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest"></script>
  <style>
    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
    }

    ::-webkit-scrollbar {
      width: 6px;
      height: 6px;
    }

    ::-webkit-scrollbar-track {
      background: transparent;
    }

    ::-webkit-scrollbar-thumb {
      background: #cbd5e1;
      border-radius: 9999px;
    }

    ::-webkit-scrollbar-thumb:hover {
      background: #94a3b8;
    }
  </style>
</head>

<body class="bg-[#f8fafc] text-gray-700 min-h-screen flex flex-col lg:flex-row antialiased">

  <!-- Mobile Top Bar Header -->
  <header class="lg:hidden bg-white border-b border-slate-100 p-4 flex items-center justify-between sticky top-0 z-30">
    <div class="flex items-center space-x-3">
      <div class="w-9 h-9 bg-gradient-to-tr from-blue-600 to-indigo-500 rounded-xl flex items-center justify-center text-white font-black text-lg shadow-md shadow-blue-500/30">
        M
      </div>
      <h1 class="font-bold text-gray-900 text-base">MoonShop</h1>
    </div>
    <button id="menu-toggle" class="p-2 rounded-xl text-gray-600 hover:bg-slate-100 transition">
      <i data-lucide="menu" class="w-6 h-6"></i>
    </button>
  </header>

  <!-- Overlay Mobile Menu -->
  <div id="mobile-overlay" class="fixed inset-0 bg-slate-900/40 z-40 hidden lg:hidden backdrop-blur-sm transition-opacity"></div>

  <!-- 1. LEFT SIDEBAR -->
  <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-white border-r border-slate-100 flex flex-col justify-between shrink-0 p-6 -translate-x-full lg:translate-x-0 lg:static transition-transform duration-300 ease-in-out">
    <div>
      <!-- Logo Header -->
      <div class="flex items-center justify-between px-2 py-2 mb-8">
        <div class="flex items-center space-x-3">
          <div class="w-10 h-10 bg-gradient-to-tr from-blue-600 to-indigo-500 rounded-xl flex items-center justify-center text-white font-black text-xl shadow-lg shadow-blue-500/30">
            M
          </div>
          <div>
            <h1 class="font-bold text-gray-900 text-lg leading-tight">MoonShop</h1>
            <p class="text-xs text-gray-400 font-medium">Customer Portal</p>
          </div>
        </div>
        <button id="close-sidebar" class="lg:hidden text-gray-400 hover:text-gray-600">
          <i data-lucide="x" class="w-5 h-5"></i>
        </button>
      </div>

      <!-- Navigation Menu -->
      <nav class="space-y-1.5">
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-3.5 px-4 py-3 rounded-2xl bg-blue-50 text-blue-600 font-semibold text-sm border-r-4 border-blue-600 transition-all">
          <i data-lucide="layout-grid" class="w-5 h-5 text-blue-600"></i>
          <span>Dashboard Saya</span>
        </a>
        <a href="{{ route('topup.form') }}" class="flex items-center space-x-3.5 px-4 py-3 rounded-2xl text-gray-400 hover:text-gray-700 hover:bg-slate-50 font-medium text-sm transition-all">
          <i data-lucide="shopping-bag" class="w-5 h-5"></i>
          <span>Top Up Game</span>
        </a>
        <a href="{{ url('/') }}" class="flex items-center space-x-3.5 px-4 py-3 rounded-2xl text-gray-400 hover:text-gray-700 hover:bg-slate-50 font-medium text-sm transition-all">
          <i data-lucide="home" class="w-5 h-5"></i>
          <span>Halaman Utama</span>
        </a>
      </nav>
    </div>

    <!-- Logout Button -->
    <div class="pt-6 border-t border-slate-100 mt-auto">
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="w-full flex items-center space-x-3 px-4 py-3 rounded-2xl text-gray-400 hover:text-red-600 hover:bg-red-50 font-medium text-sm transition-all">
          <i data-lucide="log-out" class="w-5 h-5"></i>
          <span>Keluar</span>
        </button>
      </form>
    </div>
  </aside>

  <!-- 2. CENTER CONTENT AREA -->
  <main class="flex-1 bg-[#f8fafc] flex flex-col min-w-0 border-r border-slate-100">

    <!-- Top Search & Actions Header -->
    <header class="p-4 md:p-6 pb-2 md:pb-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white/50 backdrop-blur-sm sticky top-0 z-10 border-b border-slate-100 lg:border-none">
      <div class="relative flex-1 max-w-md w-full">
        <i data-lucide="search" class="w-4 h-4 text-gray-400 absolute left-4 top-1/2 -translate-y-1/2"></i>
        <input type="text" placeholder="Cari ID transaksi..." class="w-full bg-white pl-11 pr-4 py-2.5 rounded-2xl text-sm border border-slate-200/60 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 text-gray-700 placeholder-gray-400">
      </div>

      <div class="flex items-center justify-end space-x-3">
        <a href="{{ route('topup.form') }}" class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-medium text-xs px-4 py-2.5 rounded-xl shadow-md shadow-blue-500/20 flex items-center justify-center space-x-1.5 transition">
          <i data-lucide="plus" class="w-4 h-4"></i>
          <span>Top Up Baru</span>
        </a>
      </div>
    </header>

    <!-- Scrollable Main Section -->
    <div class="p-4 md:p-6 pt-4 space-y-6 flex-1 overflow-y-auto">

      <!-- Hero Banner Card -->
      <div class="bg-gradient-to-r from-blue-600 via-indigo-600 to-blue-500 rounded-3xl p-6 md:p-7 text-white shadow-xl shadow-blue-500/10 relative overflow-hidden flex items-center justify-between">
        <div class="relative z-10 max-w-md">
          <h2 class="text-xl md:text-2xl font-bold mb-1 tracking-tight">
            Selamat Datang, {{ auth()->user()->name ?? 'Pelanggan' }}!
          </h2>
          <p class="text-blue-100 text-xs md:text-sm leading-relaxed mb-5">
            Pantau riwayat transaksi, status pesanan top up game, dan aktivitas akun Anda secara real-time di sini.
          </p>
          <a href="{{ route('topup.form') }}" class="inline-block bg-white text-blue-600 font-bold text-xs px-5 py-2.5 rounded-xl shadow border border-blue-100 hover:bg-blue-50 transition">
            Beli Item Game
          </a>
        </div>

        <div class="hidden md:block relative z-10 opacity-95">
          <svg width="180" height="120" viewBox="0 0 200 140" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="20" y="30" width="130" height="90" rx="12" fill="white" fill-opacity="0.15" />
            <rect x="35" y="45" width="100" height="60" rx="8" fill="white" fill-opacity="0.2" />
            <circle cx="140" cy="40" r="25" fill="#60A5FA" fill-opacity="0.4" />
            <path d="M70 90 C 90 60, 110 60, 130 90" stroke="white" stroke-width="4" stroke-linecap="round" fill="none" />
            <circle cx="100" cy="60" r="10" fill="white" />
          </svg>
        </div>
        <div class="absolute -right-10 -bottom-10 w-60 h-60 bg-white/10 rounded-full blur-2xl pointer-events-none"></div>
      </div>

      <!-- 4 Stats Cards Grid -->
      <div>
        <div class="flex items-center justify-between mb-3">
          <h3 class="text-sm font-bold text-gray-800">Ringkasan Aktivitas Anda</h3>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">

          <!-- Total Pengeluaran -->
          <div class="bg-white p-4 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition">
            <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center mb-3">
              <i data-lucide="wallet" class="w-5 h-5"></i>
            </div>
            <p class="text-xs font-medium text-gray-400">Total Pengeluaran Sukses</p>
            <h4 class="text-lg font-bold text-gray-900 mt-0.5">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h4>
            <div class="mt-2 flex items-center text-[11px] font-semibold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-md w-max">
              <i data-lucide="check" class="w-3 h-3 mr-1"></i>
              <span>Transaksi selesai</span>
            </div>
          </div>

          <!-- Total Transaksi -->
          <div class="bg-white p-4 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition">
            <div class="w-10 h-10 rounded-xl bg-orange-50 text-orange-500 flex items-center justify-center mb-3">
              <i data-lucide="shopping-cart" class="w-5 h-5"></i>
            </div>
            <p class="text-xs font-medium text-gray-400">Total Pembelian</p>
            <h4 class="text-lg font-bold text-gray-900 mt-0.5">{{ number_format($totalOrders) }} Kali</h4>
            <div class="mt-2 flex items-center text-[11px] font-semibold text-blue-600 bg-blue-50 px-2 py-0.5 rounded-md w-max">
              <i data-lucide="activity" class="w-3 h-3 mr-1"></i>
              <span>Semua status</span>
            </div>
          </div>

          <!-- Transaksi Sukses -->
          <div class="bg-white p-4 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition">
            <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-3">
              <i data-lucide="check-circle" class="w-5 h-5"></i>
            </div>
            <p class="text-xs font-medium text-gray-400">Top Up Sukses</p>
            <h4 class="text-lg font-bold text-gray-900 mt-0.5">{{ number_format($successfulOrders) }}</h4>
            <div class="mt-2 flex items-center text-[11px] font-semibold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-md w-max">
              <i data-lucide="trending-up" class="w-3 h-3 mr-1"></i>
              <span>Item terkirim</span>
            </div>
          </div>

          <!-- Pending -->
          <div class="bg-white p-4 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition">
            <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-500 flex items-center justify-center mb-3">
              <i data-lucide="clock" class="w-5 h-5"></i>
            </div>
            <p class="text-xs font-medium text-gray-400">Menunggu Pembayaran</p>
            <h4 class="text-lg font-bold text-gray-900 mt-0.5">{{ number_format($pendingOrders) }}</h4>
            <div class="mt-2 flex items-center text-[11px] font-semibold text-amber-600 bg-amber-50 px-2 py-0.5 rounded-md w-max">
              <i data-lucide="loader" class="w-3 h-3 mr-1"></i>
              <span>Belum dibayar</span>
            </div>
          </div>

        </div>
      </div>

      <!-- Tabel Riwayat Transaksi Saya -->
      <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-4 md:p-5">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-sm font-bold text-gray-800">Riwayat Transaksi Saya</h3>
        </div>

        <div class="overflow-x-auto">
          <table class="w-full text-left border-collapse min-w-[600px]">
            <thead>
              <tr class="text-xs font-semibold text-gray-400 border-b border-slate-100">
                <th class="pb-3 px-3">ORDER ID</th>
                <th class="pb-3 px-3">GAME & PAKET</th>
                <th class="pb-3 px-3">ID AKUN</th>
                <th class="pb-3 px-3">METODE</th>
                <th class="pb-3 px-3">STATUS</th>
                <th class="pb-3 px-3 text-right">TOTAL</th>
              </tr>
            </thead>
            <tbody class="text-xs divide-y divide-slate-50">

              @forelse($recentTransactions as $trx)
                <tr class="hover:bg-slate-50/80 transition-colors">
                  <td class="py-3.5 px-3 font-semibold text-gray-800">#{{ $trx->order_id }}</td>
                  <td class="py-3.5 px-3 font-medium text-gray-700">
                    <div>
                      <p class="font-bold text-gray-800">{{ $trx->game_name }}</p>
                      <p class="text-[11px] text-blue-600 font-semibold">{{ $trx->package_name }}</p>
                    </div>
                  </td>
                  <td class="py-3.5 px-3 text-gray-600 font-medium">
                    <p class="text-gray-800 font-bold">{{ $trx->user_id }}</p>
                    <p class="text-[10px] text-gray-400">Zone: {{ $trx->zone_id }}</p>
                  </td>
                  <td class="py-3.5 px-3 text-gray-600 font-medium uppercase text-[10px]">
                    {{ $trx->payment_method ?? '-' }}
                  </td>
                  <td class="py-3.5 px-3">
                    @if($trx->status === 'success')
                      <span class="inline-flex items-center space-x-1.5 bg-emerald-50 text-emerald-600 px-3 py-1 rounded-full text-xs font-semibold">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        <span>Sukses</span>
                      </span>
                    @elseif($trx->status === 'pending')
                      <span class="inline-flex items-center space-x-1.5 bg-amber-50 text-amber-600 px-3 py-1 rounded-full text-xs font-semibold">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                        <span>Pending</span>
                      </span>
                    @elseif($trx->status === 'failed')
                      <span class="inline-flex items-center space-x-1.5 bg-rose-50 text-rose-600 px-3 py-1 rounded-full text-xs font-semibold">
                        <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                        <span>Gagal</span>
                      </span>
                    @else
                      <span class="inline-flex items-center space-x-1.5 bg-slate-100 text-slate-600 px-3 py-1 rounded-full text-xs font-semibold">
                        <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                        <span>Expired</span>
                      </span>
                    @endif
                  </td>
                  <td class="py-3.5 px-3 text-right font-bold text-gray-800">
                    Rp {{ number_format($trx->total_price, 0, ',', '.') }}
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="6" class="py-8 text-center text-gray-400">
                    Anda belum memiliki riwayat transaksi.
                  </td>
                </tr>
              @endforelse

            </tbody>
          </table>
        </div>
      </div>

    </div>
  </main>

  <!-- 3. RIGHT SIDEBAR WIDGET PANEL -->
  <aside class="w-full lg:w-80 bg-white p-6 shrink-0 flex flex-col justify-between space-y-6 border-t lg:border-t-0 border-slate-100">
    <div>

      <!-- Dynamic User Header Profile -->
      <div class="flex items-center justify-between pb-6 border-b border-slate-100">
        <div class="flex items-center space-x-2">
          <button class="p-2 rounded-xl text-gray-400 hover:bg-slate-50">
            <i data-lucide="bell" class="w-4 h-4"></i>
          </button>
        </div>

        <div class="flex items-center space-x-3 text-right">
          <div>
            <p class="text-xs font-bold text-gray-900 leading-none">
              Halo, {{ auth()->user()->name ?? 'Pelanggan' }}
            </p>
            <p class="text-[10px] text-gray-400 mt-1">{{ auth()->user()->email ?? '' }}</p>
          </div>
          <div class="w-9 h-9 rounded-full bg-gradient-to-tr from-blue-500 to-indigo-600 text-white flex items-center justify-center font-bold text-sm shadow-md shadow-blue-500/20 ring-2 ring-white">
            {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
          </div>
        </div>
      </div>

      <!-- Schedule Calendar Widget -->
      <div class="pt-5">
        <div class="flex items-center justify-between mb-3">
          <h4 class="text-xs font-bold text-gray-800">Kalender</h4>
          <div class="flex items-center space-x-2 text-gray-400 text-xs">
            <span class="bg-blue-50 text-blue-600 text-[10px] font-bold px-2 py-0.5 rounded-lg flex items-center">
              <i data-lucide="calendar" class="w-3 h-3 mr-1"></i>
              <span id="current-month">Agustus</span>
            </span>
          </div>
        </div>

        <div id="calendar-days" class="grid grid-cols-5 gap-1.5 text-center"></div>
      </div>

      <script src="{{ asset('js/calendar.js') }}"></script>

      <!-- Customer Support Widget -->
      <div class="pt-6">
        <div class="flex items-center justify-between mb-3">
          <h4 class="text-xs font-bold text-gray-800">Bantuan Customer Service</h4>
        </div>

        <div class="space-y-3">
          <div class="flex items-center justify-between p-2 rounded-xl hover:bg-slate-50 transition">
            <div class="flex items-center space-x-3">
              <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-700 font-bold flex items-center justify-center text-xs shrink-0">
                CS
              </div>
              <div>
                <p class="text-xs font-bold text-gray-800">Admin Support</p>
                <p class="text-[10px] text-gray-400">+62 838 7309 0844</p>
              </div>
            </div>
            <div class="flex space-x-1.5 text-blue-600">
              <a href="https://wa.me/6283873090844" target="_blank" class="p-1.5 bg-blue-50 rounded-lg hover:bg-blue-100">
                <i data-lucide="message-square" class="w-3.5 h-3.5"></i>
              </a>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- Quick Action Bottom Widget -->
    <div class="pt-4 border-t border-slate-100">
      <div class="bg-gradient-to-br from-slate-50 to-blue-50/50 p-3.5 rounded-2xl border border-slate-100">
        <p class="text-xs font-bold text-gray-800">Butuh Diamond Cepat?</p>
        <p class="text-[10px] text-gray-400 mt-0.5">Lakukan pengisian ulang paket game dengan proses instan.</p>
        <a href="{{ route('topup.form') }}" class="block text-center w-full mt-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs py-2 rounded-xl shadow-sm transition">
          Top Up Sekarang
        </a>
      </div>
    </div>

  </aside>

  <script>
    lucide.createIcons();

    const menuToggle = document.getElementById('menu-toggle');
    const closeSidebar = document.getElementById('close-sidebar');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('mobile-overlay');

    function toggleMenu() {
      sidebar.classList.toggle('-translate-x-full');
      overlay.classList.toggle('hidden');
    }

    menuToggle?.addEventListener('click', toggleMenu);
    closeSidebar?.addEventListener('click', toggleMenu);
    overlay?.addEventListener('click', toggleMenu);
  </script>
</body>

</html>