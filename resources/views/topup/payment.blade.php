<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Top Up</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ $clientKey }}"></script>
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen py-10 px-4">
    <div class="max-w-md mx-auto bg-white rounded-xl p-6 shadow-md border border-gray-200 text-center">
        <h2 class="text-xl font-bold text-gray-900 mb-1">Konfirmasi & Bayar</h2>
        <p class="text-gray-500 text-xs mb-6">Order ID: <span class="font-mono text-indigo-600 font-semibold">{{ $transaction->order_id }}</span></p>

        <div class="bg-gray-50 p-4 rounded-lg mb-6 border border-gray-200 text-left space-y-2 text-sm">
            <div class="flex justify-between">
                <span class="text-gray-500">Game</span>
                <span class="font-semibold text-gray-800">{{ $transaction->game_name }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500">User ID (Zone ID)</span>
                <span class="font-semibold text-gray-800">{{ $transaction->user_id }} ({{ $transaction->zone_id }})</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500">Paket</span>
                <span class="font-semibold text-gray-800">{{ $transaction->package_name }}</span>
            </div>
            <div class="border-t border-gray-200 pt-2 flex justify-between items-center">
                <span class="text-gray-500">Total Tagihan</span>
                <span class="text-lg font-bold text-emerald-600">Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</span>
            </div>
        </div>

        <button id="pay-button" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-3 rounded-lg shadow transition duration-200 mb-3">
            Bayar Sekarang
        </button>

        <a href="{{ route('topup.form') }}" class="block w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2.5 rounded-lg text-sm border border-gray-200">
            Batal / Kembali
        </a>
    </div>

    <script type="text/javascript">
        const payButton = document.getElementById('pay-button');
        const snapToken = "{{ $transaction->snap_token }}";
        const orderId = "{{ $transaction->order_id }}";

        payButton.addEventListener('click', function() {
            window.snap.pay(snapToken, {
                onSuccess: function(result) {
                    fetch("{{ route('topup.callback') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            order_id: orderId,
                            payment_type: result.payment_type
                        })
                    }).then(() => {
                        alert("Pembayaran Berhasil!");
                        window.location.href = "{{ route('topup.form') }}";
                    });
                },
                onPending: function(result) { alert("Menunggu pembayaran..."); },
                onError: function(result) { alert("Pembayaran gagal!"); }
            });
        });
    </script>
</body>
</html>