<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyImageResource;
use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertyImageController extends Controller
{

    public function index($propertyId)
    {
        $property = Property::findOrFail($propertyId);
        $images = $property->images;

        return PropertyImageResource::collection($images);
    }

    public function store(Request $request, Property $property)
    {
        if ($request->hasFile('images')) {
            $request->validate([
                'images.*' => 'mimes:jpg,png,jpeg,webp|max:5000'
            ], [
                'images.*.mimes' => 'The file should be in one of the formats: jpg, png, jpeg, webp'
            ]);
            foreach ($request->file('images') as $file) {
                $path = $file->store('images', 'public');

                $property->images()->save(new PropertyImage([
                    'filename' => $path
                ]));
            }
        }

        return response()->json(['message' => 'Property Created successfully.']);

        // return new PropertyImageResource($image);
    }

    // Delete an image associated with a property
    public function destroy(PropertyImage $propertyImage)
    {
        $this->authorize('delete', $propertyImage);

        // Delete image file from storage
        Storage::disk('public')->delete($propertyImage->filename);

        $propertyImage->delete();

        return response()->json(['message' => 'Image deleted successfully.']);
    }
}
