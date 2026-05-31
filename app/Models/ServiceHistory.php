<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceHistory extends Model
{
    protected $fillable = [
        'vehicle_id',
        'odometer',
        'service_date',
    ];
}