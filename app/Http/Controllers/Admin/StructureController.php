<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Structure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StructureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Structure::query();

        // Filter Pencarian
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('position', 'like', '%' . $request->search . '%')
                  ->orWhere('code', 'like', '%' . $request->search . '%');
            });
        }

        // Filter Kategori
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Ambil data statistik dari seluruh database
        $stats = [
            'total'     => Structure::count(),
            'pembina'   => Structure::whereIn('category', ['pelindung', 'pembina', 'eksekutif'])->count(),
            'pengurus'  => Structure::where('category', 'pengurus')->count(),
            'seksi'     => Structure::where('category', 'seksi')->count(),
            'guru'      => Structure::where('category', 'guru')->count(),
        ];

        // Data utama tabel menggunakan pagination
        $members = $query->orderBy('order_priority', 'asc')->latest()->paginate(10)->withQueryString();

        return view('admin.structures.index', compact('members', 'stats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.structures.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'avatar'         => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'code'           => 'nullable|string|max:10',
            'name'           => 'required|string|max:255',
            'position'       => 'required|string|max:255',
            'category'       => 'required|string',
            'email_or_phone' => 'nullable|string|max:255',
            'order_priority' => 'nullable|integer',
        ]);

        // Handling Upload Avatar
        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $request->file('avatar')->store('structures', 'public');
        }

        Structure::create($validated);

        return redirect()->route('admin.structures.index')
                         ->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Structure $structure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Structure $structure)
    {
        return view('admin.structures.edit', compact('structure'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Structure $structure)
    {
        $validated = $request->validate([
            'avatar'         => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'code'           => 'nullable|string|max:10',
            'name'           => 'required|string|max:255',
            'position'       => 'required|string|max:255',
            'category'       => 'required|string',
            'email_or_phone' => 'nullable|string|max:255',
            'order_priority' => 'nullable|integer',
        ]);

        // Handling Update Avatar
        if ($request->hasFile('avatar')) {
            // Hapus avatar lama jika ada
            if ($structure->avatar && Storage::disk('public')->exists($structure->avatar)) {
                Storage::disk('public')->delete($structure->avatar);
            }

            // Simpan avatar baru
            $validated['avatar'] = $request->file('avatar')->store('structures', 'public');
        }

        $structure->update($validated);

        return redirect()->route('admin.structures.index')
                         ->with('success', 'Data anggota berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Structure $structure)
    {
        // Hapus file avatar dari storage saat data dihapus
        if ($structure->avatar && Storage::disk('public')->exists($structure->avatar)) {
            Storage::disk('public')->delete($structure->avatar);
        }

        $structure->delete();

        return redirect()->route('admin.structures.index')
                         ->with('success', 'Anggota berhasil dihapus.');
    }
}
