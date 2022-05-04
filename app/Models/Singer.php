<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Singer extends Model {
    protected $table = 'singer';
    protected $primaryKey = ['p_id', 'name'];

    public $incrementing = false;
    public $timestamps = false;
}
