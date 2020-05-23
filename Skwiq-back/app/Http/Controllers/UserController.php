<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use  App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
     
    // get user authenticated 
    public function profile()
    {
        return response()->json(['user' => Auth::user()], 200);
    }

    //get all users
    public function allUsers()
    {
         return response()->json(['users' =>  User::all()], 200);
    }

    // get oen user
    public function singleUser($id)
    {
        try {
            $user = User::findOrFail($id);

            return response()->json(['user' => $user], 200);

        } catch (\Exception $e) {

            return response()->json(['message' => 'user not found!'], 404);
        }

    }

    
}
