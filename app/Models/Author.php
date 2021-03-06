<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model {
    protected $table = 'author';
    protected $primaryKey = ['p_id', 'name'];

    public $incrementing = false;
    public $timestamps = false;
}
