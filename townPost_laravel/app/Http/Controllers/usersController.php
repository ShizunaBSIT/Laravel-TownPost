<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

/*
NOTE TO SELF: Turn responses into web routes when everything is set up
*/

class usersController extends Controller
{
    // GET
    // view user
    public function viewUser($id) {
        $user = Users::where('user_id','=',$id)->get();

        //if (!empty($user)) {
            // check if user is not empty and send all user's details to be displayed
            // (obviously we're not displaying the password on the frontend)
            //return response()->json($user);
        if ($user) {
        // Pass the user data to the view
        return view('account', ['users' => [$user]]);
        }
        else {
            return response()->json(
                ["message"=>"User not found"],
                 status: 404);
        }
    }

    // GET
    // Login user
    public function loginUser(Request $data) {
        // this finds the corresponding user using login credentials (login and password)
        /* This is meant to be different from the "view user" since this involves letting said user have the ability to login
        and start creating posts on the website */
        $email = $data->email;
        $password = $data->password;

        $user = Users::where(
            [
                ['email','=',$email]
            ]
        )->first()->get();

        if (empty($user)) { // if user empty
            return response()->json(
                ["message"=>"Login Failed, please check username and password"],
                 status: 404);
        }
        elseif (!Hash::check($password, $user->password)) { // if password dont match
            return response()->json(
                ["message"=>"Login Failed, please check password"],
                 status: 404);
        }
        else {
            // Login successful
            Auth::login($user); // Log the user in

            return response()->json([
                "message" => "Login Successful",
                "user" => $user // Include user details if necessary
            ]);
        }
    }

    // POST
    // new user : account creation
    public function createUser(Request $data) {
        $user = new Users;
        $user->username = $data->username;

        $user->email = $data->email;
        $user->password = $data->password;
        $user->date_created = $data->date_created;
        $user->save();

        // we should probably prevent the client from requesting to create a new account
        // if the user didnt enter any values in the required fields

        return response()->json([
            "message" => "User Account Created."
        ], 201);
    }

    // PUT
    // update user info
    public function updateUser(Request $data, $userID) {
        if (Users::where('user_ID',$userID)->exists()) {
            $user = Users::find($userID)->get();
            $user->username = is_null($data->username) ? $user->username : $data->username;
            $user->password = is_null($data->password) ? $user->password : $data->password;

            return response()->json(["message" => "User account Updated"]);
        } else {
            return response()->json(["message" => "User doesn't exist"]);
        }
    }

    // DELETE
    // delete user account
    /* Remember to add a second prompt to make sure the user actually wants to delete their account
    */
    public function deleteUser($userID) {
        $user = Users::find($userID)->get();

        if (!empty($user)) {
            $user->delete();

            return response()->json(["message" => "User account successfully deleted"]);

        } else {
            return response()->json(["message" => "User doesn't exist"]);
        }
    }
}
