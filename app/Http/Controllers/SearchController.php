<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class SearchController
{
    public function search(Request $request)
    {
        // Récupérer les valeurs du formulaire
        $name = $request->name;
        $location = $request->location;
        $category = $request->category;
        // Construire la requête
        $query = Ad::with(['user', 'category']);

        if ($request->filled('name')) {
            $query->whereAny([

                'title',

                'ads_description',

            ], 'like', "%$name%");

        }

        if ($request->filled('location')) {
            $query->where('location', $location);
        }

        if ($request->filled('category')) {
            $query->where('category_id', $category);
        }

        // if($price) {
        //     $query->where('ads_price', '<=', $price);
        // }

        // Récupegrer les résultats
        $ads = $query->get();
        dd($ads);

        // Retourner la vue avec les résultats
        return redirect()->route('ads.index', [
            'ads' => $ads,
        ]);
    }
}
