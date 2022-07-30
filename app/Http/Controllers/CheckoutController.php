<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
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
        return Inertia::render('Checkout/Index', [
            'data' => $request->all()
        ]);
    }
}
