<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request){
    	$this->validate($request, [
    		'username' => 'required|unique:user,username', 
    		'password' => 'required|same:repass', //check if password inputted is the same with repass
    		'repass' => 'required',
    		'usertype' => 'required',
            'firstname' => 'required',
            'lastname' => 'required'
    		]);
    	
    }
}
