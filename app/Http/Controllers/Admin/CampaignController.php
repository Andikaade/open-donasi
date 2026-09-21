<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campaigns = Campaign::with('category')->latest()->paginate(10);
        return view('admin.campaigns.index', compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.campaigns.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'target_amount' => 'required|numeric|min:1000',
            'end_date' => 'nullable|date',
            'featured_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = $request->file('featured_image')->store('campaigns', 'public');

        Campaign::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . Str::random(5),
            'category_id' => $request->category_id,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'target_amount' => $request->target_amount,
            'current_amount' => 0,
            'end_date' => $request->end_date,
            'featured_image' => $imagePath,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.campaigns.index')->with('success', 'Program donasi berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $campaign = Campaign::with('category')->findOrFail($id);

        return view('admin.campaigns.show', compact('campaign'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $campaign = Campaign::findOrFail($id);
        $categories = Category::all();
        return view('admin.campaigns.edit', compact('campaign', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       // 1. Cari data campaign berdasarkan ID
        $campaign = Campaign::findOrFail($id);

        // 2. Validasi input termasuk budget_plan_file
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'target_amount' => 'required|numeric|min:1000',
            'end_date' => 'nullable|date',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'budget_plan_file' => 'nullable|mimes:pdf,jpg,jpeg,png|max:5000', // Validasi file RAB (Max 5MB)
        ]);

        // 3. Olah Gambar Utama (Featured Image)
        $imagePath = $campaign->featured_image;
        if ($request->hasFile('featured_image')) {
            if ($campaign->featured_image && Storage::disk('public')->exists($campaign->featured_image)) {
                Storage::disk('public')->delete($campaign->featured_image);
            }
            $imagePath = $request->file('featured_image')->store('campaigns', 'public');
        }

        // 4. Olah File RAB (Budget Plan File)
        $budgetPlanPath = $campaign->budget_plan_file;
        if ($request->hasFile('budget_plan_file')) {
            if ($campaign->budget_plan_file && Storage::disk('public')->exists($campaign->budget_plan_file)) {
                Storage::disk('public')->delete($campaign->budget_plan_file);
            }
            $budgetPlanPath = $request->file('budget_plan_file')->store('campaigns/rab', 'public');
        }

        // 5. Update Database
        $campaign->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'target_amount' => $request->target_amount,
            'end_date' => $request->end_date,
            'featured_image' => $imagePath,
            'budget_plan_file' => $budgetPlanPath, // Menyimpan path file RAB
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.campaigns.index')->with('success', 'Program donasi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // 1. Cari data campaign berdasarkan ID
        $campaign = Campaign::findOrFail($id);

        // 2. Hapus file featured_image jika ada
        if ($campaign->featured_image && Storage::disk('public')->exists($campaign->featured_image)) {
            Storage::disk('public')->delete($campaign->featured_image);
        }

        // 3. Hapus file budget_plan_file (RAB) jika ada
        if ($campaign->budget_plan_file && Storage::disk('public')->exists($campaign->budget_plan_file)) {
            Storage::disk('public')->delete($campaign->budget_plan_file);
        }

        // 4. Hapus data dari database
        $campaign->delete();

        return redirect()->route('admin.campaigns.index')->with('success', 'Program donasi berhasil dihapus!');
    }
}
