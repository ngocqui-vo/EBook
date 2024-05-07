<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
    ];

    public function cartItems() {
        return $this->hasMany(CartItem::class);
    }

    public function totalItems() {
        $total = 0;
        $items = $this->cartItems;
        foreach($items as $item) {
            $total += $item->quantity;
        }
        return $total;
    }
    public function totalPrice() {
        $total_price = 0;
        $items = $this->cartItems;
        foreach($items as $item) {
            $total_price += $item->quantity * $item->bookPart->book->price;
        }
        return $total_price;
    }

    public function deliveries() {
        return $this->hasMany(Delivery::class);
    }
}
