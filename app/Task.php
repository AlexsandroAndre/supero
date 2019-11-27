<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['category_id', 'description', 'remember', 'finished', 'status'];

    public $timestamps = false;

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }
}
