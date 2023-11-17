<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Music extends Model
{
    use HasFactory, Searchable;

    protected $table = 'musics';

    protected $fillable = [
        'title',
        'opus',
        'composer_id'
    ];

    public function composer()
    {
        return $this->belongsTo(Composer::class);
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        $array['title'] = $this->title;
        $array['opus'] = $this->opus;
        $array['composer'] = $this->composer->name;

        return $array;
    }
}
