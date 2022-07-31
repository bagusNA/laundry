<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CheckoutController extends Controller
{
    public function index()
    {
        return Inertia::render('Layanan/Index', [
            'layananList' => Layanan::all()
        ]);
    }

    public function checkout(Request $request)
    {
        // $responseData = [
        //     'data' => $request->all(),
        //     'pelangganList' => Pelanggan::latest()->take(10)->get()
        // ];
        
        // if ($request->has('namaPelanggan')) {
        //     $responseData['pelangganList'] = Pelanggan::where(
        //         'nama',
        //         $request->input('nama_pelanggan')
        //     )->get();
        // }

        $response = [
            'pelangganList' => function () use ($request) {
                if ($request->has('searchPelanggan')) {
                    $nama = $request->input('searchPelanggan');
                    
                    return Pelanggan::where('nama', 'LIKE', "%$nama%")->get();
                }

                return Pelanggan::latest()->take(10)->get();
            }
        ];

        return Inertia::render('Checkout/Index', $response);
    }
}
