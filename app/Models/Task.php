<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // обязательно
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
    ];
}
