<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::with('category')
            ->where('is_active', true)
            ->latest()
            ->paginate(6);

       return view('frontend.campaigns.index', compact('campaigns'));
    }

    public function show($slug)
    {
        $campaign = Campaign::with('category')
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('frontend.campaigns.show', compact('campaign'));
    }
}
