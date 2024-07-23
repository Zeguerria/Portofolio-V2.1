<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetenceMaitrise extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'supprimer',
        'icon',
        'type_id',
        'level',
        'categorie_id',
        'created_at',
        'updated_at'
    ];
    public function type(){
        return $this->belongsTo(Parametre::class, 'type_id', 'id');
    }
}
