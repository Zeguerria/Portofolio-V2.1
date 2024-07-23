<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'created_at',
        'updated_at',
        'supprimer'
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
