<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;
use DB;

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

    	//generate salt
    	$salts = DB::table('users')->pluck('salt');
    	$hasSame = false;
    	do{
    		$alat = $this->generateSalt();
    		foreach($salts as $salt){
    			if($salt == $alat)
    				$hasSame = true;
                else
                    $hasSame = false;
    		}
    	}while($hasSame);

    	//hash password
    	$password = hash('sha256', $request->password . $alat);

    	$user = new User;
    	$user->username = $request->username;
    	$user->password = $password;
    	$user->usertype = $request->usertype;
    	$user->firstname = $user->firstname;
    	$user->lastname = $user->lastname;
    	$user->salt = $alat;

    	$user->save();

    	return redirect()->route('login');
    }
}
