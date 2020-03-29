<?php

namespace App\Http\Resources\Post;

use App\Models\Post\Post;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class PostIndexResource
 *
 * @package App\Http\Resources\Post
 *
 * @mixin Post
 */
class PostIndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
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
            //            'created_at' => $this->date('Y-m-d', strtotime($this->created_at)),
        ];
    }
}
