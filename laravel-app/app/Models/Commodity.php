<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Commodity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'manufacturer',
        'factory_id'
    ];

    public function factories(): HasMany
    {
        return $this->hasMany(Factory::class);
    }
}
