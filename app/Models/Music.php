<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model {
    protected $table = 'music';
    protected $primaryKey = 'p_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'publisher',
    ];

    public $incrementing = false;
    public $timestamps = false;
}
