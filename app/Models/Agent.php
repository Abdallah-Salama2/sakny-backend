<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Extend Authenticatable

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Agent extends Authenticatable
{
    use HasFactory, HasApiTokens;  // Use the HasApiTokens trait

    protected $guarded = [];


    public function properties()
    {
        return $this->hasMany(Property::class, 'by_agent_id');
    }
}
