<?php

namespace App\Http\Controllers;

use App\Models\feedback;
use App\Models\komentar;
use Illuminate\Http\Request;
use App\Models\makanan;
use App\Models\pesanan;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.beranda');
    }
    public function adminMakanan()
    {
        $makanan = makanan::all();
        return view('admin.makanan', ['makanan' => $makanan]);
    }
    public function adminUser()
    {
        $user = User::all();
        return view('admin.user', ['user' => $user]);
    }
    public function adminPesanan()
    {
        $pesanan = pesanan::all();
        return view('admin.pesanan', ['pesanan' => $pesanan]);
    }
    public function adminFeedback()
    {
        $feedback = feedback::all();
        return view('admin.feedback', ['feedback' => $feedback]);
    }
    public function adminKomentar()
    {
        $komentar = komentar::all();
        return view('admin.komentar', ['komentar' => $komentar]);
    }
    public function adminMakananCreate()
    {
        return view('admin.create.makanan');
    }
    public function adminUserCreate()
    {
        return view('admin.create.user');
    }
    public function adminPesananCreate()
    {
        $user = User::all();
        $makanan = makanan::all();
        return view('admin.create.pesanan', ['makanan' => $makanan, 'pemilik' => $user]);
    }
    public function adminMakananEdit($id)
    {
        $makanan = makanan::where('id', $id)->get();
        return view('admin.edit.makanan', ['makanan' => $makanan]);
    }
    public function adminUserEdit($id)
    {
        $user = User::where('id', $id)->get();
        return view('admin.edit.user', ['user' => $user]);
    }
    public function adminPesananEdit($id)
    {
        $pesanan = pesanan::where('id', $id)->get();
        return view('admin.edit.pesanan', ['pesanan' => $pesanan]);
    }
    public function adminMakananStore(Request $request)
    {
        $file = $request->file('foto');
        $path = $file->store('images', 'public');
        $makanan = new makanan;
        $makanan->nama = $request->nama;
        $makanan->harga = $request->harga;
        $makanan->foto = $path;
        $makanan->save();
        return redirect()->route('admin.makanan.create');
    }
    public function adminUserStore(Request $request)
    {
        $user = new User;
        $file = $request->file('profile_picture');
        $path = $file->store('images/profile_pictures', 'public');
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->balance = $request->balance;
        $user->profile_pic = $path;
        $user->role = $request->role;

        $user->save();
        return Redirect()->route('admin.user.create');
    }
    public function adminPesananStore(Request $request)
    {
        $pesanan = new pesanan;
        $pesanan->pemilik = $request->pemilik;
        $pesanan->isi = $request->isi;
        $pesanan->total = $request->total;
        $pesanan->terbayar = $request->terbayar;
        $pesanan->save();
        return redirect()->route('admin.pesanan.create');
    }
    public function adminMakananUpdate(Request $request, $id)
    {
        $makanan = makanan::findOrFail($id);
        if (!is_null($request->file('foto'))) {
            $file = $request->file('foto');
            $path = $file->store('images', 'public');
            Storage::disk('public')->delete($makanan->foto);
            $makanan->foto = $path;
        }
        $makanan->deskripsi = $request->deskripsi;
        $makanan->nama = $request->nama;
        $makanan->harga = $request->harga;
        $makanan->save();
        return redirect()->route('admin.makanan');
    }
    public function adminUserUpdate(Request $request, int $id)
    {
        $user = User::findOrFail($id);
        $currentProfilePic = $user->profile_pic;
        if (!is_null($currentProfilePic)) {
            Storage::disk('public')->delete($currentProfilePic);
        }

        if (!$user) {
            // Handle not found
            return response()->json(['message' => 'User Tidak Ditemukan'], 404);
        }
        if ($request->hasFile('profile_picture')) {
            $profilePicture = $request->file('profile_picture');
            $imagePath = $profilePicture->store('images/profile_pictures', 'public');

            $user->profile_pic = $imagePath;
        }
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->balance = $request->balance;
        $user->role = $request->role;
        $user->save();

        return redirect()->route('admin.user');
    }

    public function adminPesananUpdate(Request $request, $id)
    {
        $pesanan = pesanan::findOrFail($id);
        $pesanan->pemilik = $request->pemilik;
        $pesanan->isi = $request->isi;
        $pesanan->total = $request->total;
        $pesanan->terbayar = $request->terbayar;
        $pesanan->save();
        return redirect()->route('admin.pesanan');
    }

    public function adminMakananDestroy($id)
    {
        $makanan = makanan::findOrFail($id);
        Storage::disk('public')->delete($makanan->foto);
        $makanan->delete();
        return redirect()->route('admin.makanan');
    }
    public function adminUserDestroy($id)
    {
        $user = user::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user');
    }
    public function adminPesananDestroy($id)
    {
        $pesanan = pesanan::findOrFail($id);
        $pesanan->delete();
        return redirect()->route('admin.pesanan');
    }
    public function adminFeedbackDestroy($id)
    {
        $feedback = feedback::findOrFail($id);
        $feedback->delete();
        return redirect()->route('admin.feedback');
    }
    public function adminKomentarDestroy($id)
    {
        $komentar = komentar::findOrFail($id);
        $komentar->delete();
        return redirect()->route('admin.komentar');
    }
}
