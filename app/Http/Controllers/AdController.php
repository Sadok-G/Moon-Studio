<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AdController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $allAds = Ad::with(['user', 'category'])->get();
        $ads = Ad::with(['user', 'category']);
        if ($request->filled('name')) {
            $ads->where('title', 'like', "%$request->name%")
                ->orwhere('ads_description', 'like', "%$request->name%");
        }
        if ($request->filled('location')) {
            $ads->where('location', $request->location);
        }
        if ($request->filled('category')) {
            $ads->where('category_id', $request->category);
        }
        // ->when($request->filled('name'), function ($query, $name) {
        //     $query->where('title', 'like', "%$name%")
        //         ->orwhere('ads_description', 'like', "%$name%");
        // })
        // ->when($request->filled('location'), function ($query, $location) {
        //     $query->where('location', $location);
        // })
        // ->when($request->filled('category'), function ($query, $category) {
        //     $query->where('location', $category);
        // })
        $res = $ads->paginate(9);

        return view('ads.index', [
            'ads' => $res,
            'allAds' => $allAds,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('ads.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|string|max:20|min:3',
                'ads_price' => Rule::numeric()
                    ->min(500.01)
                    ->max(9999999.99)
                    ->decimal(2),
                'ads_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'ads_description' => 'required|string|max:65535|min:10',
                'category_id' => 'required',
                'location' => 'required|string|min:4|max:20',
            ]
        );

        $file_image = $request->file('ads_image');

        $image_name = time().'_'.$file_image->getClientOriginalName();

        $image_path = 'images/ads_image';

        $file_image->move($image_path, $image_name);

        $ad = Ad::create([

            'title' => $request->title,
            'ads_price' => $request->ads_price,
            'ads_image' => 'images/ads_image/'.$image_name,
            'ads_description' => $request->ads_description,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
            'location' => $request->location,
        ]);

        return back()->with('success', 'Your ads was successfully created!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ad = Ad::with(['user', 'category'])->find($id);

        return view('ads.details', [
            'ad' => $ad,
        ]);

        // return view('ads.edit', [
        //     'ad' => Ad::findOrFail($id),
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('ads.modify', [
            'ad' => Ad::findOrFail($id),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ad = Ad::findOrFail($id);
        $request->validate(
            [
                'title' => 'required|string|max:20|min:3',
                'ads_price' => Rule::numeric()
                    ->min(500.01)
                    ->max(9999999.99)
                    ->decimal(2),
                'ads_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'ads_description' => 'required|string|max:65535|min:10',
                'category_id' => 'required',
                'location' => 'required|string|min:4|max:20',
            ]
        );
        // Image recuperation
        $file_image = $request->file('ads_image');

        $image_name = time().'_'.$file_image->getClientOriginalName();

        $image_path = 'public/images/ads_image';

        $file_image->move($image_path, $image_name);

        $ad->title = $request->title;
        $ad->ads_price = $request->ads_price;
        $ad->ads_image = 'images/ads_image/'.$image_name;
        $ad->ads_description = $request->ads_description;
        $ad->category_id = $request->category_id;
        $ad->user_id = $request->user_id;
        $ad->location = $request->location;

        $ad->save();

        return redirect()->route('ads.show', $ad->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ad = Ad::findOrFail($id);
        $ad->delete();

        return redirect('ads.show');
    }
}
