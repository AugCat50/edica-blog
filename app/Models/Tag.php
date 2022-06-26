<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    //Явная привязка к таблице
    protected $table = 'tags';
    //Аналог fillable, просто отключает защиту на запись всех полей
    protected $guarded = false;
}
