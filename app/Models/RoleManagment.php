<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleManagment extends Model
{
    use HasFactory;

    protected $table = 'role_managment';

    public $timestamps = false;

    protected $fillable = [
        'role',
        'user_id',
    ];

}
