<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'price',
        'description',
        'image',
        'published_date',
        'category_id',
        'author_id',
    ];

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author() {
        return $this->belongsTo(Author::class);
    }

    public function parts() {
        return $this->hasMany(BookPart::class);
    }
    public function getBookById($id) {
      
    return self::find($id);;
    }
    public function getAllBooks() {
      
    return self::all();
    }
}
