<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'title',
        'description',
        'status',
        'assigned_to',
        'created_at',
        'updated_at',
        'supprimer'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
