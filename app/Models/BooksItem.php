<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BooksItem extends Model
{
    use HasFactory;

    protected $table = 'books_item';

    protected $fillable = [
        'books_id',
        'user_order_id',
    ];

}
