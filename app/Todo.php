<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todo_list';

    protected $fillable = ['title', 'user_id', 'desc', 'done'];
}
