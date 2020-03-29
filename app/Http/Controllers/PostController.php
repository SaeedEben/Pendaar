<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\PostStoreRequest;
use App\Http\Resources\Post\PostIndexResource;
use App\Http\Resources\Post\PostSingleShow;
use App\Models\Post\Post;
use App\Models\Post\Tag;
use App\Models\User\User;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {

        /** @var User $followed */
        $followed = User::whereJsonContains('followers', auth()->id())
            ->pluck('id')
            ->toArray();

        /** @var Post $post */
        $post = Post::with('user')
            ->whereIn('user_id', $followed)
            ->orderBy('created_at', 'ASC')
            ->paginate(9);

        /** @var PostIndexResource $postIndexResource */
        $index = PostIndexResource::collection($post);

        return view('post.show', compact('index'));

    }

    public function ownIndex()
    {
        $post = Post::query()
            ->where('user_id', auth()->id())
            ->paginate(9);

        $index = PostIndexResource::collection($post);

        return view('post.own', compact('index'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostStoreRequest $request
     *
     * @return RedirectResponse|Redirector
     */
    public function store(PostStoreRequest $request)
    {
        /** @var Post $post */
        $post = new Post();
        $post->fill($request->all());
        $post->user()->associate(auth()->id());
        $post->save();

        $tags = explode('#', $request->tags);
        unset($tags[0]);

        foreach ($tags as $tag) {
            /** @var Tag $postTag */
            $postTag = Tag::where('title', $tag)->pluck('id')->toArray();
            if ($postTag != NULL) {
                $post->tags()->sync($postTag);
            } else {
                $newTag        = new Tag();
                $newTag->title = $tag;
                $newTag->save();

                $post->tags()->sync($newTag->id);
            }
        }

        return redirect('pendaar/post/own')->with('msg', 'post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     *
     * @return Factory|View
     */
    public function show(Post $post)
    {
        $postSingle = $post->load('tags', 'user');
        $post       = new PostSingleShow($postSingle);

        $tags = $post->tags->toArray();

        foreach ($tags as $tag) {
            $mixTag[] = '#' . $tag['title'];
        }
        $output = implode("", $mixTag);

        return view('post.single', compact('post', 'output'));
    }

    /**
     * @param Post $post
     */
    public function updatePost(Post $post)
    {
        $category = Post::CATEGORY;
        foreach ($post->tags as $tag) {
            $mixTag[] = '#' . $tag['title'];
        }
        $output = implode("", $mixTag);
        return view('post.update', compact('post', 'output', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post    $post
     *
     * @return void
     */
    public function update(Request $request, Post $post)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     *
     * @return RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->back();
    }
}
