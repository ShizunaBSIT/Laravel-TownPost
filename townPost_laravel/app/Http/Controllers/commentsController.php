<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use App\Models\comments;

class commentsController extends Controller
{
    // GET Method
    // retrieve comments from a specific post
    public function viewComments($id)
    {
        $comments = comments::where('post_ID', $id)->get();
        $post = Posts::find($id);
    
        if ($comments->isEmpty()) {
            return view('comments', ['comments' => [], 'post' => $post]);
        }
    
        return view('comments', ['comments' => $comments, 'post' => $post]);
    }
    

    // POST
    // create comment
    public function postComment(Request $data) {
        $postID = $data->post_ID;
        $userID = $data->user_ID;
        $content = $data->content;

        $comment = new comments;
        $comment->post_ID = $post_ID;
        $comment->user_ID = $user_ID;
        $comment->content = $content;
        $comment->save();

        return response()->json([
            "message" => "Comment created."
        ], 201);
    }

    // PUT
    // edit comment
    public function updateComment(Request $data) {
        $comment = comments::where('post_ID','=',$data->postID)->get();

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
        $comment = comments::where('comment_ID','=',$id)->get();

        if (!empty($comment)) {
            $comment->delete();

            return response()->json(["message" => "Comment successfully deleted", 'content' => $comment]);
        }
        else {
            return response()->json(["message" => "Comment not found"]);
        }
    }

}
