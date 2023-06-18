<?php

namespace App\Providers;

use App\Models\feedback;
use App\Models\pesanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('layouts.navigation', function ($view) {
            $username = Auth::user()->name;
            $jumlahPesanan = pesanan::all()->where('pemilik', $username)->where('terbayar', 'belum')->count();
            $view->with(['jumlahPesanan' => $jumlahPesanan]);
        });
        view()->composer('layouts.sidebar', function ($view) {
            $jumlahFeedback = feedback::all()->count();
            $view->with(['jumlahFeedback' => $jumlahFeedback]);
        });
    }
}
