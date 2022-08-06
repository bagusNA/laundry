<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaction = Transaksi::with('pelanggan:id,nama')->latest();
        
        // TO DO: Pagination
        $semuaTransaksi = $transaction->take(10)->get();
        // $activeTransaction = $transaction->where('status_selesai', true);

        return Inertia::render('Transaksi/Index', [
            'semuaTransaksi' => $semuaTransaksi,
        ]);
    }

    public function detail($id)
    {
        $transaction = Transaksi::where('id', $id)
                        ->first()
                        ->get();
        
        return Inertia::render('Transaksi/Detail', [
            'transaksi' => $transaction
        ]);
    }
}
