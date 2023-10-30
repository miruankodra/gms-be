<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct()
    {
    }

    public function getUserInfo($id){
        $user = User::find($id);
        return response()->successResponse($user);
    }

    public function getUsers(){
        $users = User::all();
        return response()->successResponse($users);
    }


    public function storeProfile(Request $request){
        $data = $request->all();
        $id = (int)$request->input('id');
        $user = User::find($id)->first();
        try {
            $user->fill($request->except(['password']));
            if ($request->input('password') != null){
                $user->password = $request->input('password');
            }

            if ($user->save()){
                return response()->successResponse([], 'Profile saved!');
            } else {
                return response()->errorResponse([], 'Could not save profile!');
            }
        }
        catch (QueryException $e){
            return response()->errorResponse($e);
        }
        catch (\Exception $e){
            return response()->errorResponse($e);
        }
    }



}
