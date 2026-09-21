<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::latest()->get();
        return view('admin.artikels.index', compact('artikels'));
    }

    public function create()
    {
        return view('admin.artikels.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'excerpt'      => 'nullable|string',
            'body'         => 'required|string',
            'published_at' => 'nullable|date',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $validated['slug'] = Str::slug($request->title);

        if ($request->input('action') === 'draft') {
            $validated['published_at'] = null;
        } else {
            $validated['published_at'] = $request->published_at ?? now();
        }

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('artikels', 'public');
        }

        Artikel::create($validated);

        return redirect()->route('admin.artikels.index')->with('success', 'Artikel berhasil disimpan.');
    }

    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikels.edit', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        // 1. Ambil data artikel dari database terlebih dahulu
        $artikel = Artikel::findOrFail($id);

        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'excerpt'      => 'nullable|string',
            'body'         => 'required|string',
            'published_at' => 'nullable|date',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $validated['slug'] = Str::slug($request->title);

        // Penentuan Status berdasarkan tombol
        if ($request->input('action') === 'draft') {
            $validated['published_at'] = null;
        } else {
            $validated['published_at'] = $request->published_at ?? now();
        }

        // Jika ada upload gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($artikel->image && Storage::disk('public')->exists($artikel->image)) {
                Storage::disk('public')->delete($artikel->image);
            }
            $validated['image'] = $request->file('image')->store('artikels', 'public');
        }

        $artikel->update($validated);

        return redirect()->route('admin.artikels.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);

        if ($artikel->image && Storage::disk('public')->exists($artikel->image)) {
            Storage::disk('public')->delete($artikel->image);
        }

        $artikel->delete();

        return redirect()->route('admin.artikels.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
