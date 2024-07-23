<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilHabilitation extends Model
{
    use HasFactory;
    protected $fillable = [
        'supprimer',
        // 'parent_id',
        'profil_id',
        'habilitation_id',
        'created_at',
        'updated_at'
    ];
    public function profil(){
        return $this->belongsTo(Profil::class, 'profil_id','id');
    }
    public function habilitation(){
        return $this->belongsTo(Habilitation::class, 'habilitation_id','id');
    }
}
