<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'name',
        'release_date',
        'producer',
        'author_id',
        'category_id',
    ];

    public function author()
    {
        return $this->hasMany(Author::class);
    }

    public function category()
    {
        return $this->hasMany(Category::class);
    }
}
