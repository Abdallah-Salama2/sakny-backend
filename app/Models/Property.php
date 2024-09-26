<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'by_agent_id');
    }

    // A property can receive many inquiries
    public function inquiries()
    {
        return $this->hasMany(Inquiry::class);
    }

    // Many-to-many relationship between property and client through Inquiry
    public function users()
    {
        return $this->belongsToMany(User::class, 'inquiries')
            ->withPivot('message', 'inquiry_date', 'contact_type', 'phone_number', 'email')
            ->withTimestamps();
    }
}
