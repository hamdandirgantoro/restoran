<?php

namespace App\Http\Controllers;

use App\Models\komentar;
use Illuminate\Http\Request;
use App\Models\makanan;
use App\Models\pesanan;
use Dotenv\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class MakananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function makananHome()
    {
        $username = Auth::user()->name;
        $makanan = makanan::all();
        $pesanan = pesanan::all()->where('pemilik', $username)->where('terbayar', 'belum');
        return view('dashboard', ['makanan' => $makanan, 'pesanan' => $pesanan]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required|unique:makanan|max:255',
            ]
        );

        $makanan = new makanan;
        $makanan->name = $request->name;
        $makanan->save();
        return redirect('/pesanan');
    }

    public function detailMakanan($id)
    {
        $komentar = komentar::all()->where('id_makanan', $id);
        $makanan = makanan::all()->where('id', $id);
        return view('detail-produk', ['makanan' => $makanan, 'komentar' => $komentar]);
    }
    public function postingKomentar(Request $request, $id)
    {
        $user_id = Auth::user()->id;
        $komentar = new komentar;
        $komentar->id_pengirim = $user_id;
        $komentar->id_makanan = $request->id_makanan;
        $komentar->isi = $request->isi;
        $komentar->save();
        // yang dikoment dibawah bisa, tapi ntah kenapa kek aga gimana gitu
        // return redirect('/makanan/' . $id . '/detail');
        return redirect()->route('makanan.detail', $id);
    }
    public function editKomentar(Request $request, $id)
    {
        $komentar = komentar::findOrFail($id);
        $komentar->isi = $request->isi;
        $komentar->save();
        return redirect()->back()->with('commentID', $id);
    }
    public function deleteKomentar($id_komentar, $id)
    {
        $komentar = komentar::findOrFail($id_komentar);
        $komentar->delete();
        return redirect()->route('makanan.detail', $id = $id);
    }
}
