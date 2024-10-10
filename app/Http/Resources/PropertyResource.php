<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class PropertyResource extends JsonResource
{
    public function toArray($request)
    {
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
            'property_date' =>  $this->property_date->format('Y-m-d'), // Format the date properly
            'price' =>          $this->price,
            'status' =>         $this->status,
            'type' =>           $this->type,
            'created_at' =>     $this->created_at->toDateTimeString(),
            'updated_at' =>     $this->updated_at->toDateTimeString(),
            'preview_image_url' => $this->images->first(),
            // Relationships
            'agent' => new AgentResource($this->whenLoaded('agent')),
            'images' => PropertyImageResource::collection($this->whenLoaded('images')),
            'inquiries' => InquiryResource::collection($this->whenLoaded('inquiries')),
        ];
    }
}
