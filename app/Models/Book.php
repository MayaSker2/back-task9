<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\LogChanges;

class Book extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'number',
        // 'description',
    ];
    
    public function authors(){
        return $this->belongsToMany(Author::class);
    }

    public function reviwes(){
        return $this->morphMany(Review::class,'reviewable');
    }
}
