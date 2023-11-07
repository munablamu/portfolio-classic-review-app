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
        'publish_year',
        'product_code',
        'jacket_path'
    ];

    public function music()
    {
        return $this->belongsTo(Music::class);
    }

    public function artists()
    {
        return $this->belongsToMany(Artist::class);
    }
}
