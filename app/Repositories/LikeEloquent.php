<?php

namespace App\Repositories;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeEloquent
{
    private $model;

    public function __construct(Like $like)
    {
        $this->model = $like;
    }

    public function likeOrDislike(array $data)
    {

        $like = $this->model->where(function ($query) use ($data) {
            $query->where('user_id', auth()->user()->id)->where('type', $data['type'])->where('type_id', $data['type_id']);
        })->first();

        if (isset($like)) {
            $like->delete();
            return response_api(true, 200, 'unlike', []);
        }

        Like::create([
            'user_id' => auth()->user()->id,
            'type' => $data['type'],
            'type_id' => $data['type_id']
        ]);

        return response_api(true, 200, 'like', []);
    }
}