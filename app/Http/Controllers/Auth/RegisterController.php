<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Users; // Import the Users model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        return redirect()->route('login.form')->with('success', 'Registration successful! You can now log in.');
    }

    protected function validator(array $data)
    {

        echo "validator";

        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

    }

    protected function create(array $data)
    {

        echo "create";
        $user = new Users;
        $user->username = $data['username'];
        $user->email = $data['email'];
        $user->password = $data['password'];

        $user->save();

        return $user; 
        
        /*Users::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => $data['password'], // The model will hash it
        ]->save()); */

        /*$user = new Users;
        $user->username = $data->username;

        $user->email = $data->email;
        $user->password = $data->password;
        $user->date_created = $data->date_created;
        $user->save(); */
    }
}