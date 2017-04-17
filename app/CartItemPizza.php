<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItemPizza extends Model
{
    public $timestamps = false;
    
    protected $table = 'cart_item_pizzas';
}
