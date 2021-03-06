<?php

namespace App\Models;

use App\Notifications\SendVerifyWithQueueNotification;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    const ROLE_ADMIN  = 0;
    const ROLE_READER = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Возвращает массив ролей id => name
     * 
     * @return array
     */
    public static function getRoles()
    {
        return [
            self::ROLE_ADMIN  => 'Администратор',
            self::ROLE_READER => 'Читатель',
        ];
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new SendVerifyWithQueueNotification());
    }

    /**
     * Работа с отношением польвзователя и его понравившихся постов (многие ко многим)
     */
    public function likedPosts()
    {
        return $this->belongsToMany(Post::class, 'post_user_likes', 'user_id', 'post_id');
    }

    /**
     * Работа с отношением пользователя с его комментариями (один ко многим)
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }
}
