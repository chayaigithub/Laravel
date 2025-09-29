<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = [
        'order_number',
        'number_of_products',
        'cutomerName',
        'mobile_number',
        'order_total',
        'date',
        'status',
        'customer_id',
        'book_by',
        'order_mode',
        'contract_start_date',
        'contract_end_date',
        'time',
        'coupan',
        'address',
    ];
}
