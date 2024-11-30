<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use Carbon\Carbon;
class postsControllers extends Controller
{
    // GET - Retrieve posts sorted by date created/posted (for landing page)
    public function retrievePost() {
        // Fetch the latest 5 posts
        $posts = Posts::orderBy('date_posted', 'desc')->take(5)->get();
    }

    // GET - Retrieve a specific post (for viewing a single post)
    public function getPost($postID) {
        // this is meant to be used as a "share" link, it is not made for a search bar function
        $post = Posts::find($postID)->get();

        if (!empty($post)) {
            return response()->json($post);
        } else {
            return response()->json(["message" => "Post does not exist"]);
        }
    }

    // GET - for the search function
    public function searchPost($searchWord) {
        // This function is for searching via the search bar
        $posts = Posts::whereLike('title','%'.$searchWord.'%')
                ->orWhereLike('title','%'.$searchWord)
                ->orWhereLike('title',$searchWord.'%')->get();
        /* what the query above does is that it searches posts with titles that contains
        the string the user inputted into the search bar */

        if (!empty($posts)) {
            return response()->json($posts);
        }
        else {
            return response()->json(['message' => 'No relevant posts found']);
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
        $post = Posts::find($id)->get();

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
        $post = Posts::find($id)->get();

        if (!empty($post)) {
            $post->delete();

            return response()->json(["message" => "Post successfully deleted"]);
        } else {
            return response()->json(["message" => "Post not found"]);
        }
    }
}
