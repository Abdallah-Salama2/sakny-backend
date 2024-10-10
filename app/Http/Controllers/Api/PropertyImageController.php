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
        // Check if files are uploaded
        if ($request->has('images')) {

            dd($request->has('images'));
            // Debugging - see the files being uploaded
            // foreach ($request->file('images') as $file) {
            //     dd($file->getClientOriginalName(), $file->getMimeType());
            // }

            // Validation for image formats
            $request->validate([
                'images.*' => 'mimes:jpg,png,jpeg,webp|max:5000',
            ], [
                'images.*.mimes' => 'The file should be in one of the formats: jpg, png, jpeg, webp',
            ]);

            $savedImages = [];

            // Process each file
            foreach ($request->file('images') as $file) {
                $path = $file->store('images', 'public');

                // Save the image path to the database
                $image = $property->images()->create([
                    'filename' => $path,
                ]);

                if ($image) {
                    $savedImages[] = $image;
                }
            }

            // Return success response
            if (!empty($savedImages)) {
                return response()->json([
                    'message' => 'Property images created successfully.',
                    'images' => PropertyImageResource::collection($savedImages),
                ]);
            }
        }

        // Return error response if no files are uploaded or saved
        return response()->json([
            'message' => 'No images were uploaded or saved.',
        ], 400);
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
