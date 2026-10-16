<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RepairRequest extends Model
{
    protected $fillable = [
        'customer_id',
        'title',
        'item_name',
        'category',
        'description',
        'preferred_date',
        'service_location',
        'preferred_technician',
        'status',
        'estimated_weight_kg',
        'estimated_waste_avoided_kg',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}
