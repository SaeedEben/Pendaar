<?php

namespace App\Http\Resources\Post;

use App\Models\Post\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class PostSingleShow
 *
 * @package App\Http\Resources\Post
 * @mixin Post
 */
class PostSingleShow extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title'    => $this->title,
            'body'     => $this->body,
            'category' => $this->category,
            'name'     => $this->user->full_name,
            'ezaf'     => $this->tags->title,
        ];
    }
}
