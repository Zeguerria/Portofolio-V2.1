<?php

namespace App\Models;

use Carbon\Carbon;
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
        'start_date',
        'assigned_to',
        'created_at',
        'updated_at',
        'supprimer'
    ];

    public function project()
    {
        return $this->belongsTo(Projet::class, 'project_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }


    // CALCUL DU TEMPS RESTANT DANS LA LISTE DES TACHES DEBUT


    public function getDurationAttribute()
    {
        // Assurer que les dates sont bien présentes
        if (!$this->start_date) {
            return 'No start date';
        }
    
        $startDate = Carbon::parse($this->start_date);
        $endDate = $this->end_date ? Carbon::parse($this->end_date) : Carbon::now(); // Utiliser la date actuelle si end_date est null
    
        $duration = $endDate->diff($startDate);
    
        // Afficher la durée formatée
        if ($duration->days > 0) {
            return $duration->days . ' days';
        } elseif ($duration->h > 0) {
            return $duration->h . ' hours';
        } elseif ($duration->i > 0) {
            return $duration->i . ' mins';
        } else {
            return 'Less than a minute';
        }
    }
    
}

