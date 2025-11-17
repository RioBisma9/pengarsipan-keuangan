<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArchiveFile;
use App\Models\Category;
use App\Models\DocumentFolder;
use App\Models\DocumentRack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentRackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.archive.form-create-rack', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DocumentRack::create([
            'rack_name' => $request->name,
            'category_id' => $request->category_id,
            'kode_rack' => $request->kode_rack,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('admin.rack.archive')->with('success', 'Berhasil Menambahkan Rak dokumen!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $raks = DocumentRack::where('id', $id)->first();
        $folders = DocumentFolder::where('document_rack_id', $id)->get();
        return view('admin.archive.archive-folder', compact('raks', 'folders'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $raks = DocumentRack::findOrFail($id);
        $categories = Category::all();
        return view('admin.form.archive-rack-edit-form', compact('raks', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $raks = DocumentRack::findOrFail($id);
        $raks->update([
            'rack_name' => $request->name,
            'category_id' => $request->category_id,
            'kode_rack' => $request->kode_rack,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('admin.rack.archive')->with('success', 'Berhasil Mengupdate rak!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rak = DocumentRack::findOrFail($id);
        $folder = DocumentFolder::where('document_rack_id', $rak->id)->get();

        foreach ($folder as $fol) {
            $files = ArchiveFile::where('document_folder_id', $fol->id)->get();

            foreach ($files as $file) {
                if ($file->path_file && Storage::disk('public')->exists($file->path_file)) {
                    Storage::disk('public')->delete($file->path_file);
                }
            }
        }

        $rak->delete();

        return redirect()->route('admin.rack.archive')->with('success', 'Berhasil menghapus rak!!');
    }
}
