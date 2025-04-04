<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class diet_form extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'food_preference',
        'allergies',
        'diet',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function casts(): array
    {
        return [
            'allergies' => 'boolean',
        ];
    }
}
