<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ServiceHistory;

class Vehicle extends Model
{
    protected $fillable = [

        'user_id',

        'brand',

        'type',

        'plate_number',

        'category',

        'odometer',

        'last_service_km',

        'service_interval',

        'last_service_date',

        'next_service_date',

        'tax_due_date',
    ];

    public function serviceHistories()
{
    return $this->hasMany(
        ServiceHistory::class
    );
}
}