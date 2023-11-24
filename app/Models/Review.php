<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Review extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'user_id',
        'recording_id',
        'title',
        'content',
        'rate',
        'like'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function recording()
    {
        return $this->belongsTo(Recording::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function getCreatedAtStringAttribute()
    {
        if ( $this->created_at !== null ) {
            return $this->created_at->format('Y年m月d日');
        } else {
            return '不明';
        }
    }

    public function getUpdatedAtStringAttribute()
    {
        if ( $this->updated_at !== null ) {
            return $this->updated_at->format('Y年m月d日');
        } else {
            return '不明';
        }
    }

    public function toSearchableArray()
    {
        if ( $this->title === null ) {
            return [];
        }

        $array = $this->toArray();

        $array['title'] = $this->title;
        $array['content'] = $this->content;

        return $array;
    }
}
