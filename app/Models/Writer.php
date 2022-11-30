<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Writer extends Model
{
    use HasFactory;

    protected $table = 'writer';

    
    protected $fillable = [
        'name'
    ];

    public function books():BelongsTo
    {
         return $this->belongsTo(Books::class);
    }

}
