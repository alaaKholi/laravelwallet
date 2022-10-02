<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\UserEloquent;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $user;
    public function __construct(UserEloquent $userEloquent)
    {
        $this->user = $userEloquent;
    }

    public function login()
    {
        return $this->user->login();
    }

    public function register(Request $request)
    {
        return $this->user->register($request->all());

    }
    public function profile()
    {
        return $this->user->profile();

    }
    public function index()
    {
        return $this->user->index();
    }
    public function logout()
    {
        return $this->user->logout();
    }
}