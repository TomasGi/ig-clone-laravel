<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(User $user)
    {
        if (auth()->user()->id == $user->id ){
            return response('', 403);
        } else {
            return auth()->user()->following()->toggle($user->profile);
        }

    }
}
