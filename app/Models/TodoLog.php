<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoLog extends Model
{
    protected $table = 'todo_log';

    protected $fillable = [
        'user_id',
        'list_id',
        'title',
    ];

    public $timestamps = false;
}
