<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserOrder extends Model
{
    use HasFactory;

    protected $table = 'user_order';

    protected $fillable = [
        "status","users_id"
     ];

   
     public function booksItem():BelongsToMany
    {
        return $this->belongsToMany(Books::class, 'books_item','user_order_id','books_id');
    } 



}
