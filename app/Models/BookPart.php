<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookPart extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'part_number',
        'part_title',
        'book_id',
    ];

    public function book() {
        return $this->belongsTo(Book::class);
    }
}
