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
        return asset("storage/{$this->filename}");
    }
}
