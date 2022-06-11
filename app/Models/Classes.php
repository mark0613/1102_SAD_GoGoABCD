<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model {
    protected $table = 'classes';
    protected $primaryKey = ['p_id', 'c_id'];
    protected $fillable = [
        'p_id',
        'c_id',
    ];

    public $incrementing = false;
    public $timestamps = false;
}
