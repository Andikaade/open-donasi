<?php

namespace App\Http\Controllers;


use App\Models\Artikel;
use App\Models\Campaign;
// use App\Models\FinancialReport;
use App\Models\Gallery;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'artikels'        => Artikel::latest('published_at')->latest()->take(3)->get(),
            'campaigns'       => Campaign::with('category')->where('is_active', true)->latest()->take(3)->get(),
            'artikel_terbaru' => Artikel::latest()->take(3)->get(),
            'galeri_preview'  => Gallery::latest()->take(6)->get(),
        ]);
    }

    public function galeri()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('frontend.galeri.index', compact('galleries'));
    }

    public function transparansi()
    {
        $reports = FinancialReport::latest()->paginate(10);
        return view('frontend.transparansi.index', compact('reports'));
    }

    public function struktur()
    {
        return view('frontend.struktur.index');
    }

}
