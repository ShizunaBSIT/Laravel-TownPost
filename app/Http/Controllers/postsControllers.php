<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Auth;


class postsControllers extends Controller
{
    // GET - Retrieve posts sorted by date created/posted (for landing page)

    public function retrievePost() {
        // Fetch the latest 5 posts
        $posts = Posts::orderBy('date_posted', 'desc')->take(5)
            ->join('users', 'users.user_ID', '=', 'posts.user_ID')
            ->join('categories','categories.category_ID','=','posts.category_ID')
            ->select('posts.*','users.username','categories.name')
            ->get();

        //$posts = json_decode($posts);
        // Pass the posts to the view
        //return view('postsTest', ['posts' => $posts]);
        //return response()->json($posts);
        return view('showposts', ['posts'=> $posts]);

    }

    // GET - Retrieve a specific post (for viewing a single post)
    public function getPost($postID) {
        // this is meant to be used as a "share" link, it is not made for a search bar function

        try {
            $post = Posts::find($postID)->get();

            if (!empty($post)) {
                //return response()->json($post);
                return view('showposts',['posts' => $post]);
            } else {
                //return response()->json(["message" => "Post does not exist"]);
                return view('errorPage',['error_code' => "404", 'message' => "Post does not exist"]);
            }
        }
        catch (Exception $e) {
            return view('errorPage',['error_code' => "500", 'message' => "An error occured"]);
        }
    }

    // GET - for the search function
    public function searchPost(Request $request) {

        try {
            $searchWord = $request->query('searchWord'); // Retrieve the 'searchWord' parameter

            $posts = Posts::whereLike('title','%'.$searchWord.'%')
                ->orWhereLike('title','%'.$searchWord)
                ->orWhereLike('title',$searchWord.'%')->get();
            /* what the query above does is that it searches posts with titles that contains
            the string the user inputted into the search bar */

            if (!empty($posts)) {
                //return response()->json($posts);
                return view('showposts',['posts' => $posts]);
            }
            else {
                return response()->json(['message' => 'No relevant posts found']);
            }
        }
        catch (Exception $e) {
            return view('errorPage',['error_code' => "500", 'message' => "An error occured"]);
        }

    }

    // POST - Create a new post
    public function createPost(Request $data) {
        if (!Auth::check()) {
            return response()->json(["message" => "Unauthorized"], 401);
        }

        try {

            $post = new Posts;
            $post->user_ID = Auth::id(); //automatically assigned the logged-in users ID
            $post->category_ID = $data->category_ID;
            $post->title = $data->title;
            $post->content = $data->content;
            $post->date_posted = Carbon::parse($data->date_posted)->format('Y/m/d');
            $post->save();

            /*return response()->json([
                "message" => "Post created."
            ], 201);*/
            return view('showposts',['posts' => $post]);

        }
        catch (Exception $e) {
            return view('errorPage',['error_code' => "500", 'message' => "An error occured"]);
        }

    }

    // PUT - Update post content
    public function updatePost(Request $data, $id) {
        try {
            $post = Posts::findOrFail($id);

            if (!empty($post)) {
                //$post->title = is_null($data->title) ? $post->title : $data->title;
                //$post->content = is_null($data->content) ? $post->content : $data->content;
                //$post->save();
                $post->update([
                    'title' => $data->title,
                    'content' => $data->content,
                ]);

                //return response()->json(["message" => "Post content updated"]);
                return view('showposts',['posts' => $post]);
            } else {
                //return response()->json(["message" => "Update failed"]);
                return view('errorPage',['error_code' => "400", 'message' => "Post update error"]);
            }
        }
        catch (Exception $e) {
            return view('errorPage',['error_code' => "500", 'message' => "An error occured"]);
        }

    }

    // DELETE - Delete a post
    public function deletePost($id) {
        try {
            $post = Posts::findOrFail($id);

            if (!empty($post)) {
                $post->delete();

                //return response()->json(["message" => "Post successfully deleted"]);
                return redirect()->route('showpost');
            } else {
                //return response()->json(["message" => "Post not found"]);
                return view('errorPage',['error_code' => "404", 'message' => "Post not found"]);
            }
        }
        catch (Exception $e) {
            return view('errorPage',['error_code' => "500", 'message' => "An error occured"]);
        }

    }
}
