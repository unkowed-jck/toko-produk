<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimoni = Testimoni::latest()->paginate(10);
        return view('admin.testimoni.index', compact('testimoni'));
    }

    public function create()
    {
        return view('admin.testimoni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:100',
            'asal'      => 'nullable|string|max:100',
            'komentar'  => 'required|string',
            'rating'    => 'required|integer|min:1|max:5',
            'tipe_media'=> 'required|in:foto,video,none',
            'foto'      => 'nullable|image|max:2048',
            'video'     => 'nullable|mimes:mp4,mov,avi|max:20480',
        ]);

        $data = $request->only(['nama', 'asal', 'komentar', 'rating', 'tipe_media', 'aktif']);
        $data['aktif'] = $request->has('aktif');

        if ($request->tipe_media === 'foto' && $request->hasFile('foto')) {
    $file = $request->file('foto');
    $filename = time() . '_' . $file->getClientOriginalName();
    $file->move(public_path('uploads/foto'), $filename);
    $data['foto'] = 'uploads/foto/' . $filename;
}

        if ($request->tipe_media === 'video' && $request->hasFile('video')) {
    $file = $request->file('video');
    $filename = time() . '_' . $file->getClientOriginalName();
    $file->move(public_path('uploads/video'), $filename);
    $data['video'] = 'uploads/video/' . $filename;
}
        
        Testimoni::create($data);

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil ditambahkan!');
    }

    public function edit(Testimoni $testimoni)
    {
        return view('admin.testimoni.edit', compact('testimoni'));
    }

    public function update(Request $request, Testimoni $testimoni)
    {
        $request->validate([
            'nama'      => 'required|string|max:100',
            'asal'      => 'nullable|string|max:100',
            'komentar'  => 'required|string',
            'rating'    => 'required|integer|min:1|max:5',
            'tipe_media'=> 'required|in:foto,video,none',
            'foto'      => 'nullable|image|max:2048',
            'video'     => 'nullable|mimes:mp4,mov,avi|max:20480',
        ]);

        $data = $request->only(['nama', 'asal', 'komentar', 'rating', 'tipe_media']);
        $data['aktif'] = $request->has('aktif');

        if ($request->tipe_media === 'foto' && $request->hasFile('foto')) {
    if ($testimoni->foto) @unlink(public_path($testimoni->foto));
    $file = $request->file('foto');
    $filename = time() . '_' . $file->getClientOriginalName();
    $file->move(public_path('uploads/foto'), $filename);
    $data['foto'] = 'uploads/foto/' . $filename;
}

if ($request->tipe_media === 'video' && $request->hasFile('video')) {
    if ($testimoni->video) @unlink(public_path($testimoni->video));
    $file = $request->file('video');
    $filename = time() . '_' . $file->getClientOriginalName();
    $file->move(public_path('uploads/video'), $filename);
    $data['video'] = 'uploads/video/' . $filename;
}

        $testimoni->update($data);

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil diupdate!');
    }

    public function destroy(Testimoni $testimoni)
    {
        if ($testimoni->foto) Storage::disk('public')->delete($testimoni->foto);
        if ($testimoni->video) Storage::disk('public')->delete($testimoni->video);
        $testimoni->delete();

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil dihapus!');
    }
}