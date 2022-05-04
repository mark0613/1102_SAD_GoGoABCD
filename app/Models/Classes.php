<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model {
    protected $table = 'classes';
    protected $primaryKey = ['p_id', 'class'];

    public $incrementing = false;
    public $timestamps = false;
}
