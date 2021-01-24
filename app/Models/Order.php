<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'customer_id',
        'vendor_id',
        'order_date',
        'total_amount',
        'address',
        'status',
    ];

    public function items()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
