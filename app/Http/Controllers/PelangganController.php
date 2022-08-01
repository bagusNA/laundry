<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
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
