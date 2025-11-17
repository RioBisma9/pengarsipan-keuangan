<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DocumentRack;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin-dashboard');
    }

    public function input_archive()
    {
        // $raks = DocumentRack::with('category')->all();
        $raks = DocumentRack::with('category')->get();
        return view('admin.archive.archive-rack', compact('raks'));
    }
}
