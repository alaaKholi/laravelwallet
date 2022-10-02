<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\FriendEloquent;
use App\Repositories\PostEloquent;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    private $friend;

    public function __construct(FriendEloquent $friendEloquent)
    {
        $this->friend = $friendEloquent;
    }

    public function addOrRemoveFriend(Request $request)
    {
        return $this->friend->addOrRemoveFriend($request->all());

    }
}
