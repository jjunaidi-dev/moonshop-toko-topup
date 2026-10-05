<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;

class TopUpController extends Controller
{
    private function initMidtrans()
    {
        Config::$serverKey = config('services.midtrans.server_key', env('MIDTRANS_SERVER_KEY'));
        Config::$isProduction = config('services.midtrans.is_production', env('MIDTRANS_IS_PRODUCTION', false));
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    // Langkah 1: Tampilkan Form Input
    public function showForm()
    {
        return view('topup.checkout');
    }

    // Langkah 2: Buat Transaksi di DB & Ambil Snap Token Midtrans
    public function processPayment(Request $request)
    {
        $validated = $request->validate([
            'game_name'    => 'required|string',
            'user_id'      => 'required|string',
            'zone_id'      => 'required|string',
            'package_name' => 'required|string',
            'total_price'  => 'required|numeric',
        ]);

        $this->initMidtrans();
        $orderId = 'TRX-' . time() . '-' . strtoupper(Str::random(4));

        $params = [
            'transaction_details' => [
                'order_id'     => $orderId,
                'gross_amount' => (int) $request->total_price,
            ],
            'item_details' => [
                [
                    'id'       => 'ITEM-1',
                    'price'    => (int) $request->total_price,
                    'quantity' => 1,
                    'name'     => $request->package_name . ' (' . $request->game_name . ')',
                ]
            ],
            'customer_details' => [
                'first_name' => 'User ' . $request->user_id,
                'email'      => 'customer@example.com',
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);

            // Simpan ke database
            // Di dalam method processPayment:
            $transaction = Transaction::create([
                'customer_id'  => auth()->check() ? auth()->id() : null, // Ambil ID user/customer yang login
                'order_id'     => $orderId,
                'game_name'    => $request->game_name,
                'user_id'      => $request->user_id,
                'zone_id'      => $request->zone_id,
                'package_name' => $request->package_name,
                'total_price'  => $request->total_price,
                'status'       => 'pending',
                'snap_token'   => $snapToken,
            ]);

            // Tampilkan halaman pembayaran
            return view('topup.payment', [
                'transaction' => $transaction,
                'clientKey'   => env('MIDTRANS_CLIENT_KEY')
            ]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    // Callback saat pembayaran sukses
    public function successCallback(Request $request)
    {
        $transaction = Transaction::where('order_id', $request->order_id)->first();

        if ($transaction) {
            $transaction->update([
                'status' => 'success',
                'payment_method' => $request->payment_type ?? 'midtrans'
            ]);
        }

        return response()->json(['status' => 'ok']);
    }
}
