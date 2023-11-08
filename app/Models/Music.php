<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

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
}
