<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';
    
    protected $fillable = [
        'vendor_id',
        'food_id',
        'name',
        'type',
        'description',
        'price',
        'image_url'
    ];

    public function food()
    {
        return $this->belongsTo(Food::class, 'food_id', 'id');
    }
}
