<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model {
    protected $table = 'book';
    protected $primaryKey = 'p_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'isbn',
        'publisher',
    ];

    public $incrementing = false;
    public $timestamps = false;
}
