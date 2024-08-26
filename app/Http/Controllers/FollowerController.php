<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function follow(User $user)
    {
        $follower = auth()->user();
        // if (!$follower) {
        //     return redirect()->route('login')->with('error', 'You must be logged in to follow users.');
        // }
        $follower->following()->attach($user);
        return redirect()->route('users.show', $user->id)->with('success', 'Followed successfully');
    }
    

    public function unfollow(User $user)
    {
        $follower = auth()->user();
        if (!$follower) {
            return redirect()->route('login')->with('error', 'You must be logged in to unfollow users.');
        }
        $follower->following()->detach($user);
        return redirect()->route('users.show', $user->id)->with('success', 'Unfollowed successfully');
    }
}
