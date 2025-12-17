<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function followUnfollow(User $user) {
        // toggle() = follow jika belum follow, unfollow jika sudah follow
        $user->followers()->toggle(auth()->user());

        return response()->json([
            'followersCount' => $user->followers()->count()
        ]);
    }
}
