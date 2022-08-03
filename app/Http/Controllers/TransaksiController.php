<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TransaksiController extends Controller
{
    public function index()
    {
        $daftarTransaksi = Transaksi::all();

        return Inertia::render('Transaksi/Index', [
            'daftarTransaksi' => $daftarTransaksi
        ]);
    }
}
