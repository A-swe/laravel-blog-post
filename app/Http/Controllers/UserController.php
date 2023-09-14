<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Services\UserService;
use App\Http\Repository\UserRepository;
use Illuminate\Routing\Controller as BaseController;

class UserController extends BaseController
{
    public function __construct(UserRepository $user_repository,UserService $user_service)
    {
        $this->user_repository = $user_repository;
        $this->user_service = $user_service;
    }

    public function showUser()
    {
        $users = User::get();
        return view('user.user', compact('users'));
    }

    public function actionCreateUser() // post

    {
        return view('user.create');
    }

    public function storeUser(UserRequest $request)
    {
        $nrc = $request->nrc_region . '/' . $request->nrc_township . $request->citizen . $request->nrcno;
        $user = new User();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->dob = $request->dob;
        $user->nrc_no = $nrc;
        $user->password = md5($request->password);

        $user->save();
        return redirect('/users');
    }
    public function editUser($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }
    
    public function updateUser(UserRequest $request, $id)
    {
        $this->user_service->updateUser($request, $id);

        return redirect()->route('sa_user_detail', ['id' => $id]);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $post = Post::where('user_id', $user->id)->delete();

        getPostsByUser($id);

        $user->delete();
        return redirect()->route('login');

    }
    public function detailUser($id)
    {
        // $repo_user = $this->user_repository->getUserById($id);
        // \Log::info($repo_user);

        $user = User::findOrFail($id);
        return view('user.detail', [
            'user' => $user,
        ]);
    }
}
