<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $table = 'foods';

    protected $fillable = ['name', 'description'];

    public function menus()
    {
        return $this->hasMany(Menu::class, 'food_id', 'id');
    } 
}
