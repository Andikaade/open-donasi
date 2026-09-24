<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Structure;
use Illuminate\Http\Request;

class OrganisasiController extends Controller
{
    public function index()
    {
        // Ambil semua data diurutkan berdasarkan priority
        $structures = Structure::orderBy('order_priority', 'asc')->get();

        // Kelompokkan data berdasarkan kategori
        $pelindung = $structures->where('category', 'pelindung');
        $eksekutif = $structures->whereIn('category', ['eksekutif', 'pembina']);
        $pengurus  = $structures->where('category', 'pengurus');
        $seksi     = $structures->where('category', 'seksi');
        $guru      = $structures->where('category', 'guru');

        return view('frontend.struktur.index', compact('pelindung', 'eksekutif', 'pengurus', 'seksi', 'guru'));
    }
}
