<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AgentRegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Agent::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $agent = Agent::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone_number,
        ]);

        // Fire the Registered event
        event(new Registered($agent));

        // Create a token for the agent using Sanctum
        $token = $agent->createToken('agent-api-token');

        // Return the token and agent data as a JSON response
        return response()->json([
            'token' => $token->plainTextToken,
            'agent' => $agent,
        ]);
    }
}
