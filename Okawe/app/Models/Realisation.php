<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Realisation extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'photo1',
        'description1',
        'photo2',
        'description2',
        'photo3',
        'description3',
        'photo4',
        'description4',
        'supprimer',
        'user_id',
        'date',
        'categorie_id',
        'created_at',
        'updated_at'
    ];
    public function setDateAttribute($value)
    {
        $this->attributes['date'] = date('Y-m-d', strtotime($value));
    }
    public function categorie(){
        return $this->belongsTo(Parametre::class, 'categorie_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    // mg
    public function getLeProfil1Attribute(){
        //recupper la photo
        return Storage::url($this->attributes['photo1']);
    }
    public function getLeProfil2Attribute(){
        //recupper la photo
        return Storage::url($this->attributes['photo2']);
    }
    public function getLeProfil3Attribute(){
        //recupper la photo
        return Storage::url($this->attributes['photo3']);
    }
    public function getLeProfil4Attribute(){
        //recupper la photo
        return Storage::url($this->attributes['photo4']);
    }
}
