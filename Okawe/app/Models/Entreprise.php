<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entreprise extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'supprimer',
        'status',
        'photo',
        'phone',
        'periode',
        'responsable',
        'created_at',
        'updated_at'
    ];
    public function getLeProfilAttribute(){
        //recupper la photo
        return Storage::url($this->attributes['photo']);
    }
}
