<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends BaseController
{
    public function Userlist(Type $var = null)
    {
        $user = Auth::user();
        return $this->sendResponse($user, 'User List.');
    }
    public function index(){
        $users =DB::table('users')->get();
        return response()->json($users);
    }

    public function update(Request $request, $id)
    {
        $user = DB::table("users")->where("id", $id)->update($request->all());
        return $user? 1 : 0;
    }

    public function destroy($id)
    {
        $user = User::find($id)->delete();
    }
}
