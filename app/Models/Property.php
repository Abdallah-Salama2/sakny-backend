<?php

namespace App\Models;

use App\Scopes\FavoriteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Contracts\Database\Eloquent\Builder;

class Property extends Model
{
    use HasFactory;
    use FavoriteScope;

    protected $guarded = [];

    protected $sortable = [
        'price',
        'created_at'
    ];
    protected $casts = [
        'property_date' => 'date',
    ];
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

    public function owner(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'by_agent_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(PropertyImage::class);
    }


    public function preference()
    {
        return $this->hasMany(Preferences::class, 'property_id');
    }

    public function scopeMostRecent($query)
    {
        return $query->orderByDesc('created_at');
    }

    public function scopeFilter(Builder $query, array $filters): Builder
    {
        return $query->when(
            $filters['priceFrom'] ?? false,
            fn($query, $value) => $query->where('price', '>=', $value)
        )->when(
            $filters['priceTo'] ?? false,
            fn($query, $value) => $query->where('price', '<=', $value)
        )->when(
            $filters['beds'] ?? false,
            fn($query, $value) => $query->where('beds', (int)$value < 6 ? '=' : '>=', $value)
        )->when(
            $filters['baths'] ?? false,
            fn($query, $value) => $query->where('baths', (int)$value < 6 ? '=' : '>=', $value)
        )->when(
            $filters['areaFrom'] ?? false,
            fn($query, $value) => $query->where('area', '>=', $value)
        )->when(
            $filters['areaTo'] ?? false,
            fn($query, $value) => $query->where('area', '<=', $value)
        )->when(
            isset($filters['deleted']) && $filters['deleted'],
            function ($query) {
                return $query->onlyTrashed();
            },
            function ($query) {
                return $query->whereNull('deleted_at');
            }
        )->when(
            $filters['by'] ?? false,
            fn($query, $value) => !in_array($value, $this->sortable)
                ? $query :
                $query->orderBy($value, $filters['order'] ?? 'desc')
        );
    }
}
