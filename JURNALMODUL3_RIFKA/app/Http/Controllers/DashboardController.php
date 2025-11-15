<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
# 1. Import model User agar dapat digunakan di dalam controller.
use App\Models\User;
class DashboardController extends Controller
{

    public function index()
    {
        $mahasiswa  = User::first();
        $hours = date();
        $tanggal = $this->getTanggal();
        $salam = match (true){
            $hours >= 5 && $hours < 12 => "Selamat Pagi",
            $hours >= 12 && $hours < 15 => "Selamat Siang",
            $hours >= 15 && $hours < 18 => "Selamat Sore",
            default => "Selamat Malam"
        };

        $accessTime= date("H:i:s");
        return view('dashboard', compact('mahasiswa', 'salam', 'accessTime', 'tanggal'));
        # 2. Ambil satu data mahasiswa dari model User menggunakan fungsi first().
        # 3. Tambahkan logika untuk menentukan ucapan salam
        # 4. Buat variabel untuk menampilkan waktu akses dalam format H:i:s.
        # 5. Buat variabel untuk memanggil method getTanggal() pastikan nomor 7 sudah dikerjakan terlebih dahulu.
        # 6. Kirim data ke view dashboard menggunakan fungsi compact().
    }

    # 7. Buat method private getTanggal() untuk menghasilkan tanggal saat ini dalam format d-m-Y.
    private function getTanggal() {
        return date('d-m-y');
    }
}
