<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyResource;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentPropertyController extends Controller
{
    public function index(Request $request)
    {
        $agentId = Auth::id();
        // dd($agentId);
        $properties = Property::where('by_agent_id', $agentId)
            ->get();

        return PropertyResource::collection($properties);
    }

    // Show a single property
    public function show($id)
    {
        $property = Property::with(['agent', 'inquiries.user', 'images'])->findOrFail($id);

        return new PropertyResource($property);
    }


    // Create a new property listing
    public function store(Request $request)
    {
        // Validate request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'beds' => 'required|integer|min:1',
            'baths' => 'required|integer|min:1',
            'area' => 'required|integer|min:1',
            'property_date' => 'required|date',
            'price' => 'required|numeric',
            'status' => 'required|string',  // Assuming status is 'sale' or 'rent'
            'type' => 'required|string',
        ]);

        $validated['by_agent_id'] = Auth::id();

        // Create the property
        $property = Property::create($validated);

        // return new PropertyResource($property);
        return response()->json(['message' => 'Property Created successfully.']);
    }

    // Update an existing property listing
    public function update(Request $request, Property $property)
    {
        $this->authorize('update', $property);

        // Validate request data
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'city' => 'sometimes|required|string|max:255',
            'address' => 'sometimes|required|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'beds' => 'sometimes|required|integer|min:1',
            'baths' => 'sometimes|required|integer|min:1',
            'area' => 'sometimes|required|integer|min:1',
            'property_date' => 'sometimes|required|date',
            'price' => 'sometimes|required|numeric',
            'status' => 'sometimes|required|string',
            'type' => 'sometimes|required|string',
        ]);

        // Update the property with new data
        $property->update($validated);

        // return new PropertyResource($property);
        return response()->json(['message' => 'Property Updated successfully.']);
    }

    // Delete a property listing
    public function destroy(Property $property)
    {
        // Make sure the property belongs to the authenticated agent
        $this->authorize('delete', $property);

        $property->delete();

        return response()->json(['message' => 'Property deleted successfully.']);
    }
}
