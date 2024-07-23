<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'body',
        'post_id',
        'user_id',
        'parent_id',
        'created_at',
        'updated_at',
        'photo',
        'supprimer'
    ];

    public function getLeProfilAttribute(){
       // Récupérer la photo et vérifier si elle est valide
    $photo = $this->attributes['photo'] ?? null;
    if (empty($photo) || $photo === '/storage/') {
        return null;
    }
    return Storage::url($photo);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id')->orderBy('created_at', 'asc');
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }
}
