<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    protected $table = 'product';
    protected $primaryKey = 'p_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'p_name',
        'description',
        'photo',
        'inventory',
        'price',
        'p_type',
        'p_e_or_r',
        'publisher',
    ];

    public $timestamps = false;

    public function comments() {
        return $this->hasMany(Comment::class, 'p_id');
    }
    public function authors() {
        return $this->hasMany(Author::class, 'p_id');
    }
    public function singers() {
        return $this->hasMany(Singer::class, 'p_id');
    }
}
