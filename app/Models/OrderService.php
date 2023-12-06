<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderService extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'price',
        'service',
        'defect',
        'equipment',
        'customer_id',
        'user_id',
        'date_order',
        'status'
    ];
}
