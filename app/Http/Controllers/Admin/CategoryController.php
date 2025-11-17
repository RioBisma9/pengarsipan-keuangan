<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        return view('admin.archive.category-create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::create([
            'category_name' => $request->name,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('category.create')->with('success', 'Berhasil Menambahkan Kategory');
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
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.form.category-edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'category_name' => $request->name,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('category.create')->with('success', 'Berhasil Mengupdate Kategory');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.create')->with('success', 'Berhasil Menghapus Kategory');
    }
}
