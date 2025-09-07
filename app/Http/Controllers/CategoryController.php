<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController
{
    /**
     * Display a listing of the category.
     */
    public function index()
    {
        $categories = Category::all();

        return view('category.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('category.create', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255|min:3',
                'parent_id' => 'nullable|integer|exists:categories,id',
            ]
        );

        $category = Category::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route('category.index');
    }

    /**
     * Display the specified category.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
