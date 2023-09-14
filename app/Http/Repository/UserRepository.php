<?php

namespace App\Http\Repository;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    public function getPostCountByUsers()
    {
        $user = User::leftJoin('posts', 'posts.user_id', 'users.id')
            ->select('users.id', 'users.name', DB::raw('count(*) as post_counts'))
            ->groupBy('users.id', 'users.name')
            ->get();

        return [
            'name' => $user->pluck('name'),
            'post_counts' => $user->pluck('post_counts'),
        ];
    }

    public function updateUser($id, $user_data)
    {
        $user = User::findOrFail($id);
        $user->update($user_data);
    }

}
