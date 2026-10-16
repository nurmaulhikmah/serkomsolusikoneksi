<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Kontak;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Otomatis kirim variabel $jumlahPesan ke view admin (sesuaikan path layout sidebar kamu)
        View::composer('layouts.admin', function ($view) {
            $view->with('jumlahPesan', Kontak::count());
        });
    }
}