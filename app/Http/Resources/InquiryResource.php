<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InquiryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'message' => $this->message,
            'inquiry_date' => $this->inquiry_date,
            'contact_type' => $this->contact_type,
            'phone_number' => $this->phone_number,
            'email' => $this->email,

            // Including user (client)
            'user' => new UserResource($this->whenLoaded('user')),
        ];
    }
}
