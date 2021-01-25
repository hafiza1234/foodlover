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

    public function getStatus($code = null)
    {
        $code = $code ?: $this->status;
        
        switch ($code) {
            case 1:
                return 'Pending';
            case 2:
                return 'Processing';
            case 3:
                return 'On Delivery';
            case 4:
                return 'Delivered';
            case 5:
                return 'Cancelled';
            default:
                return 'Pending';
        }
    }

    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}
