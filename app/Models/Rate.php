<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model {
    protected $table = 'rate';
    protected $primaryKey = ['u_id', 'p_id'];
    protected $fillable = [
        'stars',
        'content',
        'time'
    ];

    public $incrementing = false;
}
