<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $guarded = [];


    protected $fillable = [
        'user_id',
        'property_id',
        'email',
        'phone_number',
        'message',
        'contact_type',
        'inquiry_date'
    ];

    // An inquiry belongs to a client
    public function client()
    {
        return $this->belongsTo(Client::class, 'user_id');
    }

    // An inquiry belongs to a property
    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
