<?php

namespace App\Models\Post;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Like
 *
 * @package App\Models\Post
 *
 * @property User $user
 * @property int  $user_id
 *
 * @property Post $post
 * @property int  $post_id
 */
class Like extends Model
{
    protected $table = 'likes';

    public $timestamps = false;

    // ------------------------------------ Relations ------------------------------------

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
