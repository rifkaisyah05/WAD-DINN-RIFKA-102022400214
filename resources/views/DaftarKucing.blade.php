@extends('layouts.dashboard')

@section('title', 'Daftar Kucing')

@section('content')
    <div class="text-center mb-5">
        <h1 class="cat-title mb-3"><span class="paw-orange">🐾</span> Daftar Kucing Peliharaan <span class="paw-orange">🐾</span></h1>
        <p class="cat-subtitle">Klik nama kucing untuk melihat detailnya</p>
    </div>

    <div class="row justify-content-center g-4">
        @foreach($kucings as $kucing)
        <div class="col-md-4 col-sm-6">
            <div class="cat-card text-center h-100">
                <h4 class="cat-name-list">{{ $kucing->nama_kucing }}</h4>
                <p class="cat-breed">{{ $kucing->ras }}</p>
                <a href="{{ route('kucing.show', $kucing->id) }}" class="btn btn-custom btn-sm mt-auto">Lihat Detail</a>
            </div>
        </div>
        @endforeach
    </div>
@endsection
