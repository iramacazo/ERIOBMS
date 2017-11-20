<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request){
    	$this->validate($request, [
    		'username' => 'required|unique:users,username', 
    		'password' => 'required|same:repass', //check if password inputted is the same with repass
    		'repass' => 'required',
    		'usertype' => 'required',
            'firstname' => 'required',
            'lastname' => 'required'
    		]);

    	//hash password
    	$password = Hash::make($request->password, [
            'rounds' => 12
        ]);

    	$user = new User;
    	$user->email = "accounting@gmail.com";  //todo
    	$user->username = $request->username;
    	$user->password = $password;
    	$user->firstname = $request->firstname;
        $user->lastname = $request->lastname;

    	$user->save();

        if(!$user->save()){
            App::abort(500, 'Error');
        }



    	return redirect()->route('login');
    }
}
