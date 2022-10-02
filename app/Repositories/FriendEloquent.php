<?php

namespace App\Repositories;

use App\Models\Friend;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;

class FriendEloquent
{
    private $model;

    public function __construct(Friend $friend)
    {
        $this->model = $friend;
    }

    public function addOrRemoveFriend(array $data)
    {
        // check if already friendship

        $friendShip = $this->model->where(function ($query) use ($data) {
            $query->where('user_id', auth()->user()->id)->where('friend_id', $data['friend_id']);
        })->orWhere(function ($query) use ($data) {
            $query->where('friend_id', auth()->user()->id)->where('user_id', $data['friend_id']);
        })->first();

        if (isset($friendShip)) {
            $friendShip->delete();
            return response_api(true, 200, 'Unfriend', []);
        }

        $friend = new Friend();
        $friend->user_id = auth()->user()->id;
        $friend->friend_id = $data['friend_id'];
        $friend->save();

        return response_api(true, 200, 'friend', []);


    }




}
