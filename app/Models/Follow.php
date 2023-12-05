<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    protected $fillable = [
        'followed_user_id', // フォロー元ID
        'following_user_id' // フォロー先ID
    ];

    public static function boot()
    {
        parent::boot();

        // TODO: これ本当に効果あるのか？
        // 自分で自分をフォローしようとしている場合に、モデルが保存されないようにする
        self::saving(function ($model) {
            if ( $model->followed_user_id === $model->following_user_id ) {
                return false;
            }
        });
    }
}
