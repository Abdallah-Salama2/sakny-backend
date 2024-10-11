<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Inquiry::all();
    }

    public function showInquiries(Property $property)
    {
        // Get all inquiries related to the specified property
        $inquiries = $property->inquiries()->with('user')->get();

        return response()->json([
            'message' => 'Inquiries fetched successfully.',
            'property' => $property->title,
            'inquiries' => $inquiries,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Property $property)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'message' => 'required|string|max:1000',
            'contact_type' => 'required|string', // Assuming this is like "call", "email", etc.
        ]);

        $userId = Auth::check() ? Auth::id() : null; // Check if user is logged in

        $inquiryDate = now();

        // Create the inquiry
        $inquiry = Inquiry::create([
            'user_id' => $userId,
            'property_id' => $property->id,
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phone_number'],
            'message' => $validatedData['message'],
            'contact_type' => $validatedData['contact_type'],
            'inquiry_date' => $inquiryDate,
        ]);

        return response()->json([
            'message' => 'Inquiry submitted successfully.',
            'inquiry' => $inquiry,
        ], 201);
    }

    public function getAgentPropertiesWithInquiries(Request $request)
    {
        $agentId = Auth::id(); // Assuming the agent is authenticated

        $properties = Property::where('by_agent_id', $agentId)
            ->with('inquiries')  // Eager load inquiries for each property
            ->get();

        $result = $properties->map(function ($property) {
            return [
                'property_id' => $property->id,
                'title' => $property->title,
                'description' => $property->description,
                'price' => $property->price,
                'inquiries' => $property->inquiries->map(function ($inquiry) {
                    return [
                        'inquiry_id' => $inquiry->id,
                        'user_id' => $inquiry->user_id,
                        'email' => $inquiry->email,
                        'phone_number' => $inquiry->phone_number,
                        'message' => $inquiry->message,
                        'contact_type' => $inquiry->contact_type,
                        'inquiry_date' => $inquiry->inquiry_date,
                    ];
                }),
            ];
        });

        return response()->json([
            'message' => 'Agent properties with inquiries fetched successfully.',
            'properties' => $result
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function getUserInquiries(Request $request)
    {
        $userId = Auth::id();

        $inquiries = Inquiry::where('user_id', $userId)
            ->with('property')  // Eager load the related property for each inquiry
            ->get();

        $result = $inquiries->map(function ($inquiry) {
            return [
                'inquiry_id' => $inquiry->id,
                'email' => $inquiry->email,
                'phone_number' => $inquiry->phone_number,
                'message' => $inquiry->message,
                'contact_type' => $inquiry->contact_type,
                'inquiry_date' => $inquiry->inquiry_date,
                'property' => [
                    'property_id' => $inquiry->property->id,
                    'title' => $inquiry->property->title,
                    'description' => $inquiry->property->description,
                    'city' => $inquiry->property->city,
                    'address' => $inquiry->property->address,
                    'price' => $inquiry->property->price,
                    'status' => $inquiry->property->status,
                ],
            ];
        });

        return response()->json([
            'message' => 'User inquiries fetched successfully.',
            'inquiries' => $result
        ]);
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
    public function destroy($id)
    {
        $inquiry = Inquiry::find($id);

        if (!$inquiry) {
            return response()->json([
                'message' => 'Inquiry not found.',
            ], 404);
        }
        // if ($inquiry->user_id !== Auth::id()) {
        //     return response()->json([
        //         'message' => 'Unauthorized to delete this inquiry.',
        //     ], 403); // Forbidden status code
        // }

        $inquiry->delete();

        return response()->json([
            'message' => 'Inquiry deleted successfully.',
        ], 200); // Success status code
    }
}
