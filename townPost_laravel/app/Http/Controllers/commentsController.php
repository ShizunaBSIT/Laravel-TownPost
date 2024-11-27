<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comments;

class commentsController extends Controller
{
    // GET Method
    // retrieve comments from a specific post
    public function viewComments($id) {
        // this function should be called when the user wants to view the comments of a post they clicked on
        // the $id is the post ID not the comment ID

        $comments = comments::where('post_ID','=',$id);

        if (!empty($comments)) {
            return response()->json($comments);
        }
        else {
            // should probably add a different variant of response when there is no error
            return response()->json(
                ["message"=>"Comments not found"],
                 status: 404);
        }
    }

    // POST
    // create comment
    public function postComment(Request $data) {
        $postID = $data->postID;
        $userID = $data->userID;
        $content = $data->content;

        $comment = new comments;
        $comment->post_ID = $postID;
        $comment->user_ID = $userID;
        $comment->content = $content;
        $comment->save();

        return response()->json([
            "message" => "Comment created."
        ], 201);
    }

    // PUT
    // edit comment
    public function updateComment(Request $data) {
        $comment = comments::where('post_ID','=',$data->postID);

        if(!empty($comment)) {
            $comment->content = is_null($data->content) ? $comment->content : $data->content;
            $comment->save();

            return response()->json(["message" => "Comment successfully updated"]);
        }
        else {
            return response()->json(["message" => "Error, comment not found"]);
        }
    }

    // DELETE
    // delete comment
    public function deleteComment($id) {
        $comment = comments::find($id);

        if (!empty($comment)) {
            $comment->delete();

            return response()->json(["message" => "Comment successfully deleted"]);
        }
        else {
            return response()->json(["message" => "Comment not found"]);
        }
    }

}
