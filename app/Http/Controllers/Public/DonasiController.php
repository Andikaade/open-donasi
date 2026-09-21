<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    public function index($slug)
    {
        $campaign = Campaign::where('slug', $slug)->firstOrFail();
        return view('frontend.campaigns.donasi', compact('campaign'));

    }
}
