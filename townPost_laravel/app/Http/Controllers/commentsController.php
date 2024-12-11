<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use App\Models\comments;
use Exception;

class commentsController extends Controller
{
    // GET Method
    // retrieve comments from a specific post
    public function viewComments($id)
    {
        try {
            $comments = comments::where('post_ID', $id)->get();
            $post = Posts::where('post_ID', $id)->get();

            // return redirect()->route('profile', ['id' => 1]);
            if ($comments->isEmpty()) {
                return view('comments',['comments' => [], 'post' => $post]);

                //return response()->json(['comments' => [], 'post' => $post]);
            }
            else {
                return view('comments',['comments' => $comments, 'post' => $post]);
            }

        }
        catch (Exception $e) {
            return view('errorPage',['error_code' => "500", 'message' => "An Error Occured"]);
        }

        //return redirect()->route('getcomments',['comments' => [], 'post' => $post]);
        //return response()->json(['comments' => [], 'post' => $post]);
    }


    // POST
    // create comment
    public function postComment(Request $data) {

        try {
            $postID = $data->post_ID;
            $userID = $data->user_ID;
            $content = $data->content;

            $comment = new comments;
            $comment->post_ID = $postID;
            $comment->user_ID = $userID;
            $comment->content = $content;
            $comment->save();

            /*return response()->json([
                "message" => "Comment created."
            ], 201);*/

            return redirect()->route('comments.view', ['id' => $postID]);
        }
        catch (Exception $e) {
            return view('errorPage',['error_code' => "500", 'message' => "An Error Occured"]);
        }

    }

    // PUT
    // edit comment
    public function updateComment(Request $data) {
        try {
            $comment = comments::where('comment_ID','=',$data->commentID)->first();

            if(!empty($comment)) {
                $comment->content = is_null($data->content) ? $comment->content : $data->content;
                $comment->save();

                //return response()->json(["message" => "Comment successfully updated"]);
                return redirect()->route('comments.view', ['id' => $data->post_ID]);
            }
            else {
            //return response()->json(["message" => "Error, comment not found"]);
            return view('errorPage',['error_code' => "400", 'message' => "Comment not found"]);
            }
        }
        catch (Exception $e) {
            return view('errorPage',['error_code' => "500", 'message' => "An Error Occured"]);
        }

    }

    // DELETE
    // delete comment
    public function deleteComment($id, Request $data) {

        try {

            $comment = comments::find($id);

            if (!empty($comment)) {
                $comment->delete();

                //return response()->json(["message" => "Comment successfully deleted", 'content' => $comment]);
                return redirect()->route('comments.view', ['id' => $data->post_ID]);
            }
            else {
                //return response()->json(["message" => "Comment not found"]);
                return view('errorPage',['error_code' => "404", 'message' => "Comment not found"]);
            }
        }
        catch (Exception $e) {
            return view('errorPage',['error_code' => "500", 'message' => "An Error Occured"]);
            //return response()->json($e->getMessage());
        }

    }

}
