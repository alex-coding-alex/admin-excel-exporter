<?php

namespace App\Models;

use App\Enums\Diet;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DietForm extends Model
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
            'diet' => Diet::class,
        ];
    }
}
