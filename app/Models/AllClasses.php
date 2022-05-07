<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllClasses extends Model {
    protected $table = 'all_classes';
    protected $primaryKey = ['c_id', 'class'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',
    ];

    public $timestamps = false;
}
