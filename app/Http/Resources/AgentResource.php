<?php

namespace App\Http\Resources;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AgentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'image_url' => $this->image_url,
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'properties' => PropertyResource::collection($this->whenLoaded('properties'))
        ];
    }
}
