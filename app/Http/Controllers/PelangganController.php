<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PelangganController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Pelanggan/Index', [
            'pelangganList' => function () use ($request) {
                if ($request->has('q')) {
                    $nama = $request->input('q');

                    return Pelanggan::where('nama', 'LIKE', "%$nama%")->get();
                }
                // TODO: pagination
                return Pelanggan::latest()->get();
            },
        ]);
    }

    public function detail($id)
    {
        $pelanggan = Pelanggan::find($id)->load('transaksi');

        return Inertia::render('Pelanggan/Detail', [
            'pelanggan' => $pelanggan
        ]);
    }

    public function create(Request $request)
    {
        $values = $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required'
        ]);

        $pelanggan = Pelanggan::create($values);

        return redirect()->back()->with('pelanggan', $pelanggan);
    }
}
