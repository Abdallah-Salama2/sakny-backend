<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyResource;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // List properties with filters
    public function index(Request $request)
    {
        // Apply filters and eager load relationships
        $filters = $request->only(['priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo', 'by', 'order', 'deleted']);

        // Fetch filtered properties with agent, inquiries, images relations
        $properties = Property::with(['agent', 'inquiries', 'images'])
            ->filter($filters)
            ->mostRecent()
            ->paginate(10); // Add pagination

        return PropertyResource::collection($properties);
    }

    // Show a single property
    public function show($id)
    {
        $property = Property::with(['agent', 'inquiries.user', 'images'])->findOrFail($id);

        return new PropertyResource($property);
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
