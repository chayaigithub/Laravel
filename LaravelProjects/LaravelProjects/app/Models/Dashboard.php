<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    protected $fillable = [
    'total_users',
    'total_orders',
    'total_completed_orders',
    'total_employees',
    'total_products',
    'todays_orders',
    'tommorows_orders',
    'total_complaints',
    ];
}
