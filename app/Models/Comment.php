<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
    protected $table = 'comment';
    protected $primaryKey = ['u_id', 'p_id'];
    protected $fillable = [
        'stars',
        'content',
        'time'
    ];

    public $incrementing = false;
}
