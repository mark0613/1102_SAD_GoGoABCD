<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllClasses extends Model {
    protected $table = 'all_classes';
    protected $primaryKey = 'c_id' ;
    protected $fillable = [
        'type',
        'class',
    ];
    public $timestamps = false;
}
