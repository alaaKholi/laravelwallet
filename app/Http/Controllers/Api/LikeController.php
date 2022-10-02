<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\LikeEloquent;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    private $like;

    public function __construct(LikeEloquent $likeEloquent)
    {
        $this->like = $likeEloquent;
    }

    public function likeOrDislike(Request $request)
    {
        return $this->like->likeOrDislike($request->all());

    }
}
