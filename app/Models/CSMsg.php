<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CSMsg extends Model {
    protected $table = 'cs_msg';
    protected $primaryKey = 'msg_id' ;
    protected $fillable = [
        'm_id',
        'c_id',
        'message',
        'time',
        'from',
    ];
    public $timestamps = false;
}
