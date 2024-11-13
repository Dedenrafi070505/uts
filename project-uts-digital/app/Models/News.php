<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    // Menentukan field yang bisa di-assign secara massal
    protected $fillable = ['title', 'content', 'author'];
}
