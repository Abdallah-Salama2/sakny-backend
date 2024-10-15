<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PropertyImage extends Model
{
    use HasFactory;

    protected $fillable = ['filename'];
    protected $appends = ['src'];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function getSrcAttribute()
    {
        // return asset("http://127.0.0.1:8000/{$this->filename}");
        return asset("https://y-sooty-seven.vercel.app/{$this->filename}");
    }
}
