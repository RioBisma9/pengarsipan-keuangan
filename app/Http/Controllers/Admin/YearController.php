<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\DocumentRack;
use App\Models\SubCategory;
use App\Models\Year;
use Illuminate\Http\Request;

class YearController extends Controller
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
    public function create_with_category($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.input_archive.year.year_create', compact('category'));
    }

    public function create_with_subcategory($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        return view('admin.input_archive.sub_category.year_sub_create', compact('subcategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi minimal
        $request->validate([
            'year' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'subcategory_id' => 'nullable|exists:sub_categories,id',
        ]);

        Year::create([
            'year' => $request->year,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->subcategory_id,
        ]);

        return redirect()->route('category.show', ['category' => $request->category_id])
            ->with('success', 'Berhasil Menambahkan Tahun');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $year = Year::findOrFail($id);

        // Ambil racks milik Year
        $racks = DocumentRack::where('year_id', $year->id)->get();
        $category = Category::where('id', $year->category_id)->first();

        return view('admin.input_archive.rack.archive-rack', compact('racks', 'year', 'category'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $year = Year::findOrFail($id);
        return view('admin.input_archive.year.year_edit', compact('year'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'year' => 'required|string|max:255',
        ]);

        $year = Year::findOrFail($id);

        $year->update([
            'year' => $request->year,
        ]);

        // Tentukan redirect berdasarkan parent polymorphic
        $parent = $year->yearable;

        if ($parent instanceof Category) {
            $redirectId = $parent->id;
        } else if ($parent instanceof SubCategory) {
            $redirectId = $parent->category_id;
        } else {
            $redirectId = null;
        }

        return redirect()->route('category.show', ['category' => $redirectId])
            ->with('success', 'Berhasil Mengupdate Tahun');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // 1. Ambil Year
        $year = Year::findOrFail($id);

        // 2. Ambil parent morph (bisa SubCategory atau Category)
        $parent = $year->yearable;

        // 3. Tentukan Category ID
        if ($parent instanceof SubCategory) {
            // Year berada di bawah SubCategory → ambil Category via relasi
            $categoryId = $parent->category->id;
        } else {
            // Year langsung berada di bawah Category
            $categoryId = $parent->id;
        }

        // 4. Hapus Year
        $year->delete(); // YearObserver akan menangani penghapusan Rack/Folder/File

        // 5. Redirect balik ke halaman Category
        return redirect()
            ->route('category.show', ['category' => $categoryId])
            ->with('success', 'Berhasil Menghapus Tahun');
    }
}
