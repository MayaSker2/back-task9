<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        // 'bio',
    ];

    public function books(){
        return $this->belongsToMany(Book::class);
    }
    public function reviwes(){
        return $this->morphMany(Review::class,'reviewable');
    }
}
