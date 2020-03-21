<?php

namespace App\Models\User;

use App\Models\Post\Post;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 *
 * @package App\Models\User
 *
 * @property int    $id
 *
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 *
 * @property string $mobile
 *
 * @property string $password
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'first_name', 'last_name',
        'email', 'mobile',
        'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // ------------------------------------ Relations ------------------------------------

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // ------------------------------------ Attributes ------------------------------------

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . $this->last_name;
    }
}
