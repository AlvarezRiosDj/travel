<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $primaryKey = 'abbr';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['abbr','name','flag','status'];
}
