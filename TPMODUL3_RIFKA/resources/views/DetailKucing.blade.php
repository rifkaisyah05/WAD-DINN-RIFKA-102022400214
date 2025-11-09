@extends('layouts.dashboard')

@section('title', 'Detail Kucing')

@section('content')
<div class="cat-card mx-auto" style="max-width: 600px;">
    <h2 class="cat-title mb-4 text-center">{{ $kucing->nama_kucing }}</h2>
    <ul class="list-group list-group-flush mb-4">
        <li class="list-group-item"><strong>Ras:</strong> <span style="font-weight: 400;">{{ $kucing->ras }}</span></li>
        <li class="list-group-item"><strong>Warna Bulu:</strong> <span style="font-weight: 400;">{{ $kucing->warna_bulu }}</span></li>
        <li class="list-group-item"><strong>Usia:</strong> <span style="font-weight: 400;">{{ $kucing->usia }} tahun</span></li>
        <li class="list-group-item"><strong>Deskripsi:</strong> <span style="font-weight: 400;">{{ $kucing->deskripsi }}</span></li>
    </ul>
    <div class="text-center">
        <a href="{{ route('kucing.index') }}" class="btn btn-custom">Kembali ke Daftar</a>
    </div>
</div>
@endsection
