<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'description', 'remember', 'finished', 'status'];

    public $timestamps = true;
}
