<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Artist extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'name'
    ];

    public function recordings()
    {
        return $this->belongsToMany(Recording::class, 'recording_artist');
    }

    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, 'user_recordings');
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        $array['name'] = $this->name;

        return $array;
    }
}
