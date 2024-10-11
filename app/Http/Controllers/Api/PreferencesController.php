<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyResource;
use App\Models\Preferences;
use App\Models\Property;
use Illuminate\Http\Request;

class PreferencesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $userId = auth()->user()->id;

        // dd($userId);

        $customerFavoritePropertyIds = Preferences::where('user_id', $userId)
            ->pluck('property_id')
            ->toArray();

        $favoriteProperties = Property::with('owner', 'images', 'preference')
            ->whereIn('id', $customerFavoritePropertyIds)
            ->paginate(8);
        // dd($customerFavoritePropertyIds, $favoriteProperties);

        $products = PropertyResource::collection($favoriteProperties);
        $products->each(function ($product) {
            $product->favoriteStats = 1;
        });

        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function add($propertyId)
    {



        $userId = auth()->user()->id;
        // dd($userId);
        $property = Property::find($propertyId);
        $propertyInPrefernce = Preferences::where('user_id', $userId)
            ->where('property_id', $propertyId)
            ->first();
        // dd($property,$propertyInPrefernce);

        if ($propertyInPrefernce) {
            // $product->favorite_count -= 1;
            $propertyInPrefernce->delete();
            $property->save();

            return response()->json([
                'message' => 'Property removed from Favorites.',
            ], 409);
        }

        Preferences::create([
            'user_id' => $userId,
            'property_id' => $propertyId,
        ]);

        // $property->favorite_count++;
        // $product->save();
        // $favorite->save();

        return response()->json([
            'message' => 'Property Added To Favorites ',
        ], 200);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
