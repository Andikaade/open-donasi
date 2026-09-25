<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Announcement::query();

        // Filter Pencarian Judul / Deskripsi / Badge
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%')
                  ->orWhere('badge', 'like', '%' . $request->search . '%');
            });
        }

        // Filter Status Aktif/Non-Aktif
        if ($request->has('is_active') && $request->is_active !== null && $request->is_active !== '') {
            $query->where('is_active', $request->is_active);
        }

        // Hitungan Statistik
        $stats = [
            'total'    => Announcement::count(),
            'active'   => Announcement::where('is_active', true)->count(),
            'inactive' => Announcement::where('is_active', false)->count(),
        ];

        // Ambil Data Utama
        $announcements = $query->latest()->paginate(10)->withQueryString();

        return view('admin.announcements.index', compact('announcements', 'stats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'badge'                 => 'required|string|max:255',
            'title'                 => 'required|string|max:255',
            'description'           => 'required|string',
            'primary_button_text'   => 'nullable|string|max:255',
            'primary_button_url'    => 'nullable|string|max:255',
            'secondary_button_text' => 'nullable|string|max:255',
            'secondary_button_url'  => 'nullable|string|max:255',
            'secondary_button_file' => 'nullable|file|mimes:pdf,doc,docx|max:5120', // Max 5MB
            'kuota'                 => 'nullable|string|max:255',
            'batas_akhir'           => 'nullable|string|max:255',
            'beasiswa'              => 'nullable|string|max:255',
            'is_active'             => 'boolean',
        ]);

        // Handle File Upload
        if ($request->hasFile('secondary_button_file')) {
            $validated['secondary_button_file'] = $request->file('secondary_button_file')->store('announcements/files', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        Announcement::create($validated);

        return redirect()->route('admin.announcements.index')->with('success', 'Pengumuman berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement)
    {
        return view('admin.announcements.edit', compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Announcement $announcement)
    {
        $validated = $request->validate([
            'badge'                 => 'required|string|max:255',
            'title'                 => 'required|string|max:255',
            'description'           => 'required|string',
            'primary_button_text'   => 'nullable|string|max:255',
            'primary_button_url'    => 'nullable|string|max:255',
            'secondary_button_text' => 'nullable|string|max:255',
            'secondary_button_url'  => 'nullable|string|max:255',
            'secondary_button_file' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'kuota'                 => 'nullable|string|max:255',
            'batas_akhir'           => 'nullable|string|max:255',
            'beasiswa'              => 'nullable|string|max:255',
            'is_active'             => 'boolean',
        ]);

        // Jika ada upload file baru
        if ($request->hasFile('secondary_button_file')) {
            // Hapus file lama jika ada
            if ($announcement->secondary_button_file && Storage::disk('public')->exists($announcement->secondary_button_file)) {
                Storage::disk('public')->delete($announcement->secondary_button_file);
            }

            // Simpan file baru
            $validated['secondary_button_file'] = $request->file('secondary_button_file')->store('announcements/files', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        $announcement->update($validated);

        return redirect()->route('admin.announcements.index')->with('success', 'Pengumuman berhasil diperbarui!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return redirect()->route('admin.announcements.index')
            ->with('success', 'Pengumuman berhasil dihapus.');
    }
}
