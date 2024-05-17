<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'cart_id',
        'book_part_id',
        'quantity',
        'created_at'
    ];

    public function cart() {
        return $this->belongsTo(Cart::class);
    }

    public function bookPart() {
        return $this->belongsTo(BookPart::class);
    }

    public function totalPrice() {
        return $this->quantity * $this->bookPart->book->price;
    }
}
