<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reactions;
use Illuminate\Support\Facades\DB;

use function Pest\Laravel\json;

class reactionController extends Controller
{
    // GET
    // retrieve reactions
    public function getReactions($id) {
        // $id is the post id
        $reactions = reactions::where('post_ID','=',$id)->select(DB::raw('count(*) as total'))->groupBy('reaction')->get();

        if (!empty($reactions)) {
            return response()->json($reactions);
        }
        else {
            return response()->json(["message" => "Reactions not found"]);
        }
    }

    // POST
    public function react(Request $data) {
        //$data = json_decode($data);

        $reaction = new reactions;
        $reaction->post_ID = $data->post_ID;
        $reaction->user_ID = $data->user_ID;
        $reaction->reaction = $data->reaction;
        $reaction->save();

        return response()->json(["message" => "reaction posted"]);
    }

    // DELETE
    public function unreact(Request $data) {
        $reaction = reactions::where("post_ID","=",$data->post_ID)->where("user_ID","=",$data->user_ID)->get();

        if(!empty($reaction)) {
            $reaction->delete();

            return response()->json(["message" => "successfully unreacted"]);
        }
        else {
            return response()->json(["message" => "reaction not found"]);
        }
    }

}
