<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\CommentEloquent;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private $comment;
    public function __construct(CommentEloquent $postEloquent)
    {
        $this->comment = $postEloquent;
    }

    public function show($id)
    {
        return $this->comment->show($id);

    }
    public function store(Request $request)
    {
        return $this->comment->store($request->all());

    }

    public function update($id,Request $request)
    {
        return $this->comment->update($id,$request->all());
    }

    public function destroy($id)
    {
        return $this->comment->destroy($id);

    }
}