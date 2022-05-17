<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premium_order extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'user_id',
    ];
}
