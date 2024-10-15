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
        // Validate the request to ensure an image URL is provided
        $request->validate([
            'image_url' => 'required|url', // Ensure it's a valid URL
        ]);

        // Save the image URL to the database
        $image = $property->images()->create([
            'filename' => $request->image_url, // Directly save the image URL
        ]);

        // Return success response if the image was saved
        if ($image) {
            return response()->json([
                'message' => 'Property image created successfully.',
                'images' => new PropertyImageResource($image),
            ]);
        }

        // Return error response if the image was not saved
        return response()->json([
            'message' => 'No image was saved.',
        ], 400);
    }
    // public function store(Request $request, Property $property)
    // {
    //     // Check if files are uploaded
    //     if ($request->hasFile('images')) {



    //         // Validation for image formats
    //         $request->validate([
    //             'images.*' => 'mimes:jpg,png,jpeg,webp|max:5000',
    //         ], [
    //             'images.*.mimes' => 'The file should be in one of the formats: jpg, png, jpeg, webp',
    //         ]);

    //         $savedImages = [];

    //         // Process each file
    //         foreach ($request->file('images') as $file) {
    //             // Define the filename
    //             $filename = time() . '_' . $file->getClientOriginalName();

    //             // Store the file in the 'public/images' directory using the Storage facade
    //             $path = $file->storeAs('public/images', $filename);

    //             // Remove 'public/' prefix for storing the image path in the database
    //             $relativePath = str_replace('public/', '', $path);

    //             // Save the image path to the database
    //             $image = $property->images()->create([
    //                 'filename' => $relativePath, // Save relative path
    //             ]);

    //             if ($image) {
    //                 $savedImages[] = $image;
    //             }
    //         }

    //         // Return success response if any images were saved
    //         if (!empty($savedImages)) {
    //             return response()->json([
    //                 'message' => 'Property images created successfully.',
    //                 'images' => PropertyImageResource::collection($savedImages),
    //             ]);
    //         }
    //     }

    //     // Return error response if no files are uploaded or saved
    //     return response()->json([
    //         'message' => 'No images were uploaded or saved.',
    //     ], 400);
    // }
    // Delete an image associated with a property
    public function destroy(PropertyImage $propertyImage)
    {


        $propertyImage->delete();

        return response()->json(['message' => 'Image deleted successfully.']);
    }
}
