<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //Явная привязка к таблице
    protected $table = 'categories';
    //Аналог fillable, просто отключает защиту на запись всех полей
    protected $quarded = false;
}
