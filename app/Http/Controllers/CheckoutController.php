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
}
