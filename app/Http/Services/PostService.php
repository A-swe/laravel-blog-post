<?php

namespace App\Http\Services;

use App\Http\Repository\PostRepository;

class PostService
{
    public function __construct(PostRepository $post_repository)
    {
        $this->post_repository = $post_repository;
    }

    public function createPost($post, $user)
    {
        $post['user_id'] = $user->id;
        $post['type'] = $post['post_type'];
        $this->post_repository->createPost($post);
    }

    public function editPost($id, $post)
    {
        $this->post_repository->editPost($id, $post);
    }

}
