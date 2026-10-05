<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $customerId = Auth::id(); // Ambil ID user/customer login

        // Ambil 10 transaksi terbaru milik user ini saja
        $recentTransactions = Transaction::where('customer_id', $customerId)
            ->latest()
            ->take(10)
            ->get();

        // Hitung statistik khusus untuk user ini
        $totalRevenue = Transaction::where('customer_id', $customerId)
            ->where('status', 'success')
            ->sum('total_price');

        $totalOrders = Transaction::where('customer_id', $customerId)->count();

        $successfulOrders = Transaction::where('customer_id', $customerId)
            ->where('status', 'success')
            ->count();

        $pendingOrders = Transaction::where('customer_id', $customerId)
            ->where('status', 'pending')
            ->count();

        return view('customers.dashboard', compact(
            'recentTransactions',
            'totalRevenue',
            'totalOrders',
            'successfulOrders',
            'pendingOrders'
        ));
    }
}