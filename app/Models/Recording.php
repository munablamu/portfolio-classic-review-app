<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recording extends Model
{
    use HasFactory;

    protected $fillable = [
        'music_id',
        'title',
        'release_date',
        'catalogue_no',
        'jacket_filename',
        'average_rate'
    ];

    protected $casts = [
        'release_date' => 'datetime',
    ];

    public function music()
    {
        return $this->belongsTo(Music::class);
    }

    public function artists()
    {
        return $this->belongsToMany(Artist::class, 'recording_artist');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, 'user_recordings');
    }

    public function setAverageRate()
    {
        $this->average_rate = $this->reviews()->avg('rate');
        $this->save();
    }

    public function getAverageRateStringAttribute()
    {
        return number_format($this->average_rate, 1);
    }

    public function getArtistsStringAttribute()
    {
        if ( $this->artists !== null && count($this->artists) > 0 ) {
            $names = array_map(function ($artist) {
                return $artist['name'];
            }, $this->artists->toArray());

            return implode(', ', $names);
        } else {
            return 'unknown';
        }
    }

    public function getReleaseDateStringAttribute()
    {
        $release_date = $this->release_date;
        if ( $release_date !== null ) {
            return $release_date->format('Y年m月d日');
        } else {
            return '不明';
        }
    }

    public function getReleaseYearAttribute()
    {
        $release_date = $this->release_date;
        if ( $release_date !== null ) {
            return $release_date->format('Y');
        } else {
            return '';
        }
    }
}
