<?php

namespace App\Repositories;

use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentEloquent
{
    private $model;

    public function __construct(Comment $comment)
    {
        $this->model = $comment;
    }

    public function show($id)
    {
        $post = Comment::find($id);
        return response_api(true,200,'Successfully !',CommentResource::make($post));
    }
    
    public function store(array $data )
    {
        $post = Comment::create($data);
        return response_api(true,200,'Successfully !',$post->fresh());
        
    }

    public function update($id,array $data)
    {
            $post = Comment::find($id);
             if ($post != null) {
                $post->text=$data['text']?$data['text']:$post->text;
                $post->user_id=$data['user_id']?$data['user_id']:$post->text;
                $post->save();
                return response_api(true, 200, 'Success',CommentResource::make($post));

            } else {
                return response_api(false, 200, 'There is no post to edit!','');

            }
    }

    public function destroy($id)
    {
        $post = Comment::find($id)->delete();
        return response_api(true,200,'Successfully !','deleted');
        
    }


}