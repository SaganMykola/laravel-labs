<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Factory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'number_of_employees',
        'area',
        'address',
        'user_id'

    ];

    public function commodity(): HasMany
    {
        return $this->hasMany(Commodity::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
