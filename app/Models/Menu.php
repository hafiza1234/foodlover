<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }

    public function isAddedToCart()
    {
        $items = cache()->get('cart-' . Auth::id(), []);

        foreach ($items as $item) {
            if ($item['menu_id'] == $this->id) {
                return true;
            }
        }
        
        return false;
    }

    public function canBeAddedToCart()
    {
        $items = cache()->get('cart-' . Auth::id(), []);
        
        if ($this->isAddedToCart()) {
            return false;
        }
        
        foreach ($items as $item) {
            if ($item['vendor_id'] != $this->vendor_id) {
                return false;
            }
        }

        return true;
    }
}
