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
            'artikel_terbaru' => Artikel::latest()->take(3)->get(), // Hanya 3 artikel
            'galeri_preview' => Gallery::latest()->take(6)->get(),   // Preview foto terbatas
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

    public function artikel()
    {
        $artikels = Artikel::latest()->paginate(9);
        return view('frontend.artikel.index', compact('artikels'));
    }
    public function showArtikel($slug)
    {
        $artikel = Artikel::where('slug', $slug)->firstOrFail();

        return view('frontend.artikel.show', compact('artikel'));
    }
    public function struktur()
    {
        return view('frontend.struktur.index');
    }
    public function campaigns()
    {
        $campaigns = Campaign::where('is_active', true)->latest()->paginate(9);
    return view('frontend.campaigns.index', compact('campaigns'));
    }
    public function showCampaign($slug)
    {
        $campaign = Campaign::where('slug', $slug)->where('is_active', true)->firstOrFail();
        return view('frontend.campaigns.show', compact('campaign'));
    }
    public function donasiCampaign($slug)
    {
        $campaign = Campaign::where('slug', $slug)->firstOrFail();
        return view('frontend.campaigns.donasi', compact('campaign'));

    }
}
