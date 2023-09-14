<?php

namespace App\Http\Repository;

use App\Models\Post;

class PostRepository
{
    public function createPost($post)
    {
        Post::create($post);
    }

    public function editPost($id, $post)
    {
        $post_update = Post::findOrFail($id);
        $post_update->update([
            'title' => $post['title'],
            'message' => $post['message'],
            'type' => $post['post_type'],
        ]);
    }

}
