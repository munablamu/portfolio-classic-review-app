<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Review extends Model
{
    use HasFactory;
    use Searchable;

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
