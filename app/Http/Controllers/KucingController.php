<?php

namespace App\Http\Controllers;

use App\Models\Kucing;
use Illuminate\Http\Request;

class KucingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kucings = Kucing::all();
        return view('DaftarKucing', compact('kucings'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kucing = Kucing::findOrFail($id);
        return view('DetailKucing', compact('kucing'));
    }
}

