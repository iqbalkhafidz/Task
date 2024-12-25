<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes; // Gunakan trait SoftDeletes

    protected $fillable = ['name', 'slug', 'description'];

    protected$dates = ['deleted_at'];

    public function tasks()
    {
    return $this->hasMany(Task::class);
    }
}

