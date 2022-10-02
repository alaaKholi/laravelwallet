<?php

namespace App\Repositories;

use App\Http\Resources\CommentResource;
use App\Http\Resources\PostResource;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostEloquent
{
    private $model;

    public function __construct(Post $post)
    {
        $this->model = $post;
    }

    public function index()
    {

        $posts = Post::paginate(5);
        //$x = $post->comments;
        //dd($posts);
        return response_api(true,200,'Successfully !',PostResource::collection($posts));
    }
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return response_api(true,200,'Successfully !',PostResource::make($post));
    }

    public function store(array $data )
    {
        $post = Post::create($data);
        return response_api(true,200,'Successfully !',$post->fresh());

    }

    public function update($id,array $data)
    {
            $post = Post::find($id);
            if ($post != null) {
                $post->text=$data['text']?$data['text']:$post->text;
                $post->user_id=$data['user_id']?$data['user_id']:$post->text;
                $post->save();
                return response_api(true, 200, 'Success',PostResource::make($post));

            } else {
                return response_api(false, 200, 'There is no post to edit!','');

            }
    }

    public function destroy($id)
    {
        $post = Post::find($id)->delete();
        return response_api(true,200,'Successfully !','deleted');

    }

    public function timeline()
    {
        $posts = Post::paginate(5);
        return response_api(true,200,'Successfully !',PostResource::collection($posts));

    }


}