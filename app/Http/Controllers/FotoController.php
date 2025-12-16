<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('foto.index', ['foto' => Foto::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('foto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload file
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);

        // Simpan ke database
        $validateData['image'] = $imageName;
        Foto::create($validateData);

        return redirect('/foto')->with('pesan', "Foto berhasil diupload");
    }

    /**
     * Display the specified resource.
     */
    public function show(Foto $foto)
    {
        return view('foto.show', compact('foto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Foto $foto)
    {
        return view('foto.edit', compact('foto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Foto $foto)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Jika user upload gambar baru
        if ($request->hasFile('image')) {

            // Hapus file lama
            $oldPath = public_path('uploads/' . $foto->image);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }

            // Upload file baru
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);

            $validateData['image'] = $imageName;
        }

        $foto->update($validateData);

        return redirect('/foto/' . $foto->id)
            ->with('pesan', "Foto berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Foto $foto)
    {
        // Hapus file fisik
        $path = public_path('uploads/' . $foto->image);
        if (file_exists($path)) {
            unlink($path);
        }

        $foto->delete();

        return redirect('/foto')->with('pesan', "Foto berhasil dihapus");
    }
}