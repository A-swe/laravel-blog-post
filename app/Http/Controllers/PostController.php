<?php

namespace App\Http\Controllers;

use App\Http\Repository\PostRepository;
use App\Http\Requests\PostRequest;
use App\Http\Services\PostService;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PDF;

class PostController extends Controller
{
    public function __construct(PostRepository $post_repository, PostService $post_service)
    {
        $this->middleware('auth')->except(['showPostList']);
        $this->post_repository = $post_repository;
        $this->post_service = $post_service;
    }

    public function showPostList()
    {
        $user = Auth::user();
        if ($user) {
            $posts = Post::where('user_id', $user->id)->where('type', 2)->orWhere('type', 1)->latest()->paginate(3);
        } else {
            $posts = Post::where('type', 1)->get();
        }

        return view('post.list', compact('posts'));
    }
    public function createPost()
    {
        return view('post.create');
    }

    public function storePost(PostRequest $request)
    {
        $this->post_service->createPost($request->all(), Auth::user());
        return redirect('/feed')->with('success', 'New Post stored Successfully');
    }

    public function editPost($id)
    {
        $post = Post::find($id);
        return view('post.edit', compact('post'));
    }

    public function updatePost(PostRequest $request, $id)
    {
        $this->post_service->editPost($id, $request->all());

        return redirect()->route('sa_list_post')->with('success', 'Updated Post Successfully');
    }

    public function deletePost($id)
    {
        $post = Post::find($id)->delete();
        return redirect('/feed')->with('success', 'Deleted Post Successfully');

    }
    public function detailPost($id)
    {
        $post = Post::find($id);
        return view('post.detail', [
            'post' => $post,
        ]);
    }

    public function pdfDownloadPost($id)
    {
        $post = Post::find($id);
        $pdf = PDF::loadView('post.pdf', compact('post'));

        return $pdf->download('post.pdf');
    }

}
