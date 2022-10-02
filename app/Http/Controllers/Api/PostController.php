<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\PostEloquent;
use Illuminate\Http\Request;

class PostController extends Controller
{

    private $post;
    public function __construct(PostEloquent $postEloquent)
    {
        $this->post = $postEloquent;
    }

    public function index()
    {
        return $this->post->index();

    }
    public function timeline()
    {
        return $this->post->timeline();

    }
    public function show($id)
    {
        return $this->post->show($id);

    }
    public function store(Request $request)
    {
        return $this->post->store($request->all());

    }

    public function update($id,Request $request)
    {
        return $this->post->update($id,$request->all());
    }

    public function destroy($id)
    {
        return $this->post->destroy($id);

    }

}
