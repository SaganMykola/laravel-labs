<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function commodity(): BelongsTo
    {
        return $this->belongsTo(Commodity::class);
    }
}
