<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Buyer extends Model
{
    use HasFactory;

    protected $table = 'buyer';
    
    protected $fillable = [
       "status","books_id","users_id"
    ];

    public function buyer():BelongsTo
    {
        return $this->belongsTo(User::class,'users_id');
    }

    public function books():BelongsTo
    {
        return $this->belongsTo(Books::class);
    }

}
