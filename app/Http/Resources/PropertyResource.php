<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class PropertyResource extends JsonResource
{
    public function toArray($request)
    {
        // Initialize favoriteStats as null or default it
        $favoriteStats = null;

        // Only check the favorite status if the user is authenticated
        if ($request->user()) {
            $favorite = $this->preference->pluck('id');
            $favoriteStats = !empty($favorite[0]) ? 1 : 0;
        }
        return [
            'id' =>             $this->id,
            'title' =>          $this->title,
            'description' =>    $this->description,
            'city' =>           $this->city,
            'address' =>        $this->address,
            'latitude' =>       $this->latitude,
            'longitude' =>      $this->longitude,
            'beds' =>           $this->beds,
            'baths' =>          $this->baths,
            'area' =>           $this->area,
            'property_date' =>  $this->property_date ? $this->property_date->format('Y-m-d') : '',
            'price' =>          $this->price,
            'status' =>         $this->status,
            'type' =>           $this->type,
            'created_at' =>     $this->created_at ? $this->created_at->toDateTimeString() : null,
            'updated_at' =>     $this->updated_at ? $this->updated_at->toDateTimeString() : null,
            'preview_image_url' => $this->images->first(),
            // Conditionally include favoriteStats if the user is authenticated
            $this->mergeWhen($request->user(), [
                'favoriteStats' => $favoriteStats,
            ]),
            // Relationships
            'agent' => new AgentResource($this->whenLoaded('agent')),
            'images' => PropertyImageResource::collection($this->whenLoaded('images')),
            'inquiries' => InquiryResource::collection($this->whenLoaded('inquiries')),
        ];
    }
}
