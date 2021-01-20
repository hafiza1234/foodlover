<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    use HasFactory;

    protected $table = 'order_details';

    protected $fillable = [
        'oredr_id',
        'menu_id',
        'qty',
        'amount',
        'total_amount'
    ];


}
