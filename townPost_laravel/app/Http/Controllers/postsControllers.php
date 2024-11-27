<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class postsControllers extends Controller
{
    // GET
    // retrieve posts sorted by date created/posted
    public function retrievePosts() {
        $posts = Posts::all()->sortBy('date_created', SORT_NATURAL, false)->limit(5);

        return response()->json($posts);
    }

    // GET
    // retrieve specific post
    public function getPost($postID) {
        $post = Posts::find($postID);

        if (!empty($post)) {
            return response()->json($post);
        }
        else {
            return response()->json(["message" => "post does not exist"]);
        }
    }

    // POST
    // create post
    public function createPost(Request $data) {
        $post = new Posts;
        $post->user_ID = $data->user_ID;
        $post->category_ID = $data->category_ID;
        $post->title = $data->title;
        $post->content = $data->content;
        $post->date_posted = $data->data_posted;
        $post->save();

        return response()->json([
            "message" => "Post created."
        ], 201);
    }

    // PUT
    public function updatePost(Request $data, $id) {

        $post = Posts::find($id);

        if (!empty($post)) {
            $post->title = is_null($data->title) ? $post->title : $data->title;
            $post->content = is_null($data->content) ? $post->content : $data->content;

            return response()->json(["message" => "Post content updated"]);
        }
        else {
            return response()->json(["message" => "Update failed"]);
        }

    }

    // DELETE
    public function deletePost($id) {
        $post = Posts::find($id);

        if (!empty($post)) {
            $post->delete();

            return response()->json(["message" => "post successfully deleted"]);
        }
        else {
            return response()->json(["message" => "post not found"]);
        }
    }


}
