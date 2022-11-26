<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Books extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'name',
        'writer_id'
    ];

    public function writer():BelongsTo
    {
        return $this->belongsTo(Writer::class,'writer_id');
    }
}
