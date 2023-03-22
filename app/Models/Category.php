<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'uid',
    ];

    public function products(){
        return $this->hasMany(Product::class, 'cat_id');
    }

    public function users(){
        return $this->belongsTo(User::class);
    }
}
