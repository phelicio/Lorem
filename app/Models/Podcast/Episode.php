<?php

namespace App\Models\Podcast;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'podcast_id',
        'name',
        'image',
    ];
    
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    
    public function podcast()
    {
        return $this->belongsTo(Podcast::class);
    }
}
