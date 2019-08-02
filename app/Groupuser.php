<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groupuser extends Model
{
    protected $table = 'group_user';
    protected $fillable = ['user_id','group_id'];
}
