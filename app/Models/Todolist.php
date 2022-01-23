<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    protected $table = 'todo_list';

    protected $fillable = [
        'user_id',
        'title',
        'deadline',
        'active',
    ];

    public $timestamps = false;
}
