<?php

namespace App\Http\Services;

use App\Http\Requests\UserRequest;
use App\Http\Repository\UserRepository;

class UserService
{
    public function __construct(UserRepository $user_repository)
    {
        $this->user_repository = $user_repository;
    }

    public function createUser($user)
    {
        \Log::info($request);
    }

    public function updateUser(UserRequest $request, $id)
    {
        $nrc = $request->nrc_region . '/' . $request->nrc_township . $request->citizen . $request->nrcno;

        $user_data = [
            'email' => $request->email,
            'name' => $request->name,
            'gender' => $request->gender,
            'nrc_no' => $nrc,
            'dob' => $request->dob,
        ];

        if ($request->hasFile('image')) {
            $img_extension = $id . time() . '.' . $request->image->extension();
            $user_data['image'] = $img_extension;
            $request->image->storeAs('public/images', $user_data['image']);
        }

        $this->user_repository->updateUser($id, $user_data);
    }
}
