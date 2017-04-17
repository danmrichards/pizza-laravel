<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItemBase extends Model
{
    public $timestamps = false;
    
    protected $table = 'cart_item_bases';
}
