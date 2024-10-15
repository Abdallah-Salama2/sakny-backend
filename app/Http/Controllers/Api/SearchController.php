<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AgentResource;
use App\Http\Resources\PropertyResource;
use App\Models\Agent;
use App\Models\Property;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //

    public function search(Request $request, $type)
    {
        // Sanitize the input from request
        $query = $request->input('query');
        // dd($request , $query);
        // Check if the query string is empty or too short, return an empty array
        if (empty($query) || strlen($query) < 3) {
            return response()->json(['message' => 'No results found', 'data' => []], 200);
        }

        // Initialize the results array
        $results = [];

        if ($type === "agent") {
            // Search in the Agent model
            $results = Agent::where('name', 'LIKE', '%' . $query . '%')
                ->limit(10)
                ->get();
            $data = AgentResource::collection($results);
        } else {
            // Search in the Property model based on the type (Buy or Rent)
            $results = Property::where('address', 'LIKE', '%' . $query . '%')
                ->orWhere('city', 'LIKE', '%' . $query . '%')
                ->limit(10)
                ->get();
            $data = PropertyResource::collection($results);
        }

        // Return a structured JSON response
        return response()->json([
            'message' => 'Search results',
            'data' => $data
        ], 200);
    }
}
