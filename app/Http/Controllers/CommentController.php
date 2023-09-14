<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function addComment(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);

        $comment = new Comment();
        $comment->content = $request->content;

        $comment->user_id = auth()->user()->id;

        $post->comments()->save($comment);

        return redirect()->route('sa_detail_post', $post);
    }
    public function deleteComment($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->route('sa_list_post',);
    }

    public function editComment(Request $request,$id)
    {
        Comment::find($id)->update([
            'content' => $request->content,
        ]);
        return redirect()->route('sa_list_post')->with('success', 'Updated Post Successfully');
    }
}
