<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'id_user_manager','id_user','id_category','task_name','desc','start_date','due_date'
    ];
}
