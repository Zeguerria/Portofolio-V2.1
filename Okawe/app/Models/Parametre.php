<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parametre extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'libelle',
        'description',
        'supprimer',
        // 'parent_id',
        'type_parametre_id',
        'created_at',
        'updated_at'
    ];
    public function type_parametre(){
        return $this->belongsTo(TypeParametre::class, 'type_parametre_id', 'id');
    }
    public function realisations(){
        return $this->hasMany(Realisation::class, 'categorie_id', 'id');
    }
    public function competencemaitrises(){
        return $this->hasMany(CompetenceMaitrise::class, 'type_id', 'id');
    }
}
