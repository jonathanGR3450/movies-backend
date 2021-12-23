<?php

namespace App\Models;

use App\Presenters\Authors\AuthorPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'name'
    ];

    public function movie()
    {
        return $this->hasMany(Movie::class);
    }

    public function present()
    {
        return new AuthorPresenter($this);
    }
}
