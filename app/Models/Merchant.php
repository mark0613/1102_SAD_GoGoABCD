<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model {
    protected $table = 'merchant';

    protected $primaryKey = 'u_id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'm_type',
    ];

    public $incrementing = false;
    public $timestamps = false;
}
