<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

        // Menghapus task secara permanen
    public function hapus(Category $task)
    {
        // Menghapus task secara permanen
        $task->forceDelete();
    
        return redirect()->route('category.index')->with('success', 'Kategory berhasil di hapus.');
    }
}