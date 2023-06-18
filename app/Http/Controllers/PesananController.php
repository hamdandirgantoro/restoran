<?php

namespace App\Http\Controllers;

use App\Models\pesanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function listBelumDibayar()
    {
        $user = Auth::user();

        $pesanan = pesanan::all()->where('pemilik', $user->name)->where('terbayar', 'belum');
        return view('pesanan.belum-dibayar', ['pesanan' => $pesanan]);
    }
    public function listSudahDibayar()
    {
        $user = Auth::user();

        $pesanan = pesanan::all()->where('pemilik', $user->name)->where('terbayar', 'sudah');
        return view('pesanan.sudah-dibayar', ['pesanan' => $pesanan]);
    }
    public function store(Request $request)
    {
        $username = Auth::user()->name;

        $pesanan = new pesanan;
        $pesanan->pemilik = $username;
        $pesanan->isi = $request->nama;
        $pesanan->total = $request->harga;
        $pesanan->terbayar = 'belum';
        $pesanan->save();
        return redirect('/dashboard');
    }
    public function update($id)
    {

        $pesanan = Pesanan::findOrFail($id);
        $user = Auth::user();

        if ($pesanan->total <= $user->balance) {
            $pesanan->terbayar = 'sudah';

            if (!is_numeric($pesanan->total)) {
                return redirect()->route('pesanan')->with('error', 'Maaf operasi tidak dapat diproses,total pesanan haruslah berupa angka.');
            }
            $user->balance -= $pesanan->total;

            // $user->decrement('balance', $pesanan->total); // Decrement the balance by the harga value
            $user->save();
            $pesanan->save();
            return redirect()->route('pesanan')->with('success', 'Pembayaran sukses.');
        } else {
            return redirect()->route('pesanan')->with('error', 'Isi dompet anda tidak cukup.');
        }
    }
}
