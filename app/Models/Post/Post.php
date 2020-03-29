<?php

namespace App\Models\Post;

use App\Models\User\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 *
 * @package App\Models\Post
 *
 * @property int    $id
 *
 * @property string $title
 * @property string $body
 *
 * @property string $category
 *
 * @property User   $user
 * @property int    $user_id
 *
 * @property Tag    $tags
 * @property int    $tag_id
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Post extends Model
{
    protected $table = 'posts';

    const MEMORABLE = 'memorable';
    const SAD       = 'sad';
    const HAPPY     = 'happy';
    const POLITIC   = 'politic';
    const CATEGORY  = [
        self::MEMORABLE,
        self::SAD,
        self::HAPPY,
        self::POLITIC,
    ];

    protected $fillable = [
        'title', 'body', 'category',
    ];

    // ------------------------------------ Relations ------------------------------------

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }
}
