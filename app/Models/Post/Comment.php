<?php

namespace App\Models\Post;

use App\Models\User\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 *
 * @package App\Models\Post
 *
 * @property int    $id
 *
 * @property string $body
 *
 * @property User   $user
 * @property int    $user_id
 *
 * @property Post   $post
 * @property int    $post_id
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 */
class Comment extends Model
{
    protected $table = 'comments';

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
