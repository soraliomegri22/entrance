<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Love extends Model
{
    protected $table = 'love';

    protected $fillable = ['count', 'man_name', 'women_name'];
}