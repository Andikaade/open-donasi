<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::latest()->paginate(9);
        return view('frontend.artikel.index', compact('artikels'));

    }
    public function show($slug)
    {
        $artikel = Artikel::where('slug', $slug)->firstOrFail();

        return view('frontend.artikel.show', compact('artikel'));
    }
}
