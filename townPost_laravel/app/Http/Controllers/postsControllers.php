<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use Carbon\Carbon;
class postsControllers extends Controller
{
    // GET - Retrieve posts sorted by date created/posted (for landing page)
    public function index() {
        // Fetch the latest 5 posts
        $posts = Posts::orderBy('date_posted', 'desc')->take(5)->get();

        // Pass the posts to the view
        return view('landing', compact('posts'));
    }

    // GET - Retrieve a specific post (for viewing a single post)
    public function getPost($postID) {
        $post = Posts::find($postID);

        if (!empty($post)) {
            return response()->json($post);
        } else {
            return response()->json(["message" => "Post does not exist"]);
        }
    }

    // POST - Create a new post
    public function createPost(Request $data) {
        $post = new Posts;
        $post->user_ID = $data->user_ID;
        $post->category_ID = $data->category_ID;
        $post->title = $data->title;
        $post->content = $data->content;
        $post->date_posted = Carbon::parse($data->date_posted)->format('Y/m/d');
        $post->save();

        return response()->json([
            "message" => "Post created."
        ], 201);
    }

    // PUT - Update post content
    public function updatePost(Request $data, $id) {
        $post = Posts::find($id);

        if (!empty($post)) {
            $post->title = is_null($data->title) ? $post->title : $data->title;
            $post->content = is_null($data->content) ? $post->content : $data->content;
            $post->save();

            return response()->json(["message" => "Post content updated"]);
        } else {
            return response()->json(["message" => "Update failed"]);
        }
    }

    // DELETE - Delete a post
    public function deletePost($id) {
        $post = Posts::find($id);

        if (!empty($post)) {
            $post->delete();

            return response()->json(["message" => "Post successfully deleted"]);
        } else {
            return response()->json(["message" => "Post not found"]);
        }
    }
}
