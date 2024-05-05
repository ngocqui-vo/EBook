<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    // protected $table = 'reviews';
    // public $timestamps = false;

    protected $fillable = [
        'id',
        'rating',
        'comment',
        'user_id',
        'book_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    public static function store($rating, $content, $productId)
    {
        $review = new Review();
        $review->rating = $rating;
        $review->content = $content;
        $review->product_id = $productId;
        $review->user_name = session('user_name');
        $review->created_at = date('Y-m-d H:i:s');
        return $review->save();
    }
    use HasFactory;
}
