<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tag
 *
 * @package App\Models\Post
 *
 * @property int    $id
 *
 * @property string $title
 *
 */
class Tag extends Model
{
    protected $table = 'tags';

    // ------------------------------------ Relations ------------------------------------

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tag');
    }
}
