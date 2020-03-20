<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
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
}
