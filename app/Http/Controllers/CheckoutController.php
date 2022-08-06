<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\JenisLayanan;
use App\Models\Layanan;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CheckoutController extends Controller
{
    public function index()
    {
        return Inertia::render('Layanan/Index', [
            'layananList' => Layanan::with('jenis')->get(),
            'kategoriList' => JenisLayanan::all()
        ]);
    }

    public function checkout(Request $request)
    {
        $response = [
            'pelangganList' => function () use ($request) {
                if ($request->input('formName') === 'searchPelanggan') {
                    $nama = $request->input('query');
                    
                    return Pelanggan::where('nama', 'LIKE', "%$nama%")
                                        ->take(15)
                                        ->get();
                }

                return Pelanggan::latest()->take(15)->get();
            },
            'pelanggan' => function () use ($request) {
                $session = $request->session();

                if ($session->has('pelanggan')) {
                    return $session->get('pelanggan');
                }
                return null;
            }
        ];

        return Inertia::render('Checkout/Index', $response);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'list.*.id' => 'required',
            'list.*.qty' => 'required',
            'list.*.subtotal' => 'required',
            'pelanggan.id' => 'required',
            'pelanggan.nama' => 'required',
            'pelanggan.no_hp' => 'required',
            'pelanggan.alamat' => 'required',
        ]);

        $totalHarga = 0;
        $totalBerat = 0;
        $detailsValue = [];
        
        foreach ($data['list'] as $list) {
            $totalHarga += $list['subtotal'];
            $totalBerat += $list['qty'];

            $detailsValue[] = new DetailTransaksi([
                'id_layanan' => $list['id'],
                'berat' => $list['qty'],
                'subtotal' => $list['subtotal'],
                'status_diambil' => false
            ]);
        };

        $transaksiValue = [
            'id_pelanggan' => $data['pelanggan']['id'],
            'id_karyawan' => Auth::user()->id,
            'total_berat' => $totalBerat,
            'total_harga' => $totalHarga,
        ];

        $transaksi = Transaksi::create($transaksiValue);
        $transaksi->details()->saveMany($detailsValue);

        return back()->with('success', 'Transaksi berhasil disimpan!');
    }
}
