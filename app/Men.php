<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Men extends Model
{
    protected $table = 'men';

    protected $fillable = ['id', 'name', 'women_id', 'women_id_1', 'women_id_2', 'women_id_3'];
}
