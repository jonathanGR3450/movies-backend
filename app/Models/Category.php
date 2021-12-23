<?php

namespace App\Models;

use App\Presenters\Categories\CategoryPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
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
        return $this->belongsTo(Movie::class);
    }

    public function present()
    {
        return new CategoryPresenter($this);
    }
}
