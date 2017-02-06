<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\User;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->toArray();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $user = new User([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'twitter' => $request->input('twitter'),
                'password' => bcrypt($request->input('password')),
            ]);
            $user->save();
            Log::info("User stored");
            return response()->json(['status'=>true, 'User stored'], 200);
        
        } catch (\Exception $e) {
            Log::critical("Could not store user: {$e->getCode()} , {$e->getLine()} , {$e->getMessage()}");
            // return response("Could not store user: {$e->getCode()} , {$e->getLine()} , {$e->getMessage()}");
            return response('Something bad',500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $user = User::find($id);

            if (!$user){
                return response()->json(['This id doesnt exist'],404);
            }

            return response()->json($user,200);

        } catch (Exception $e) {
            Log::critical("Could not store user: {$e->getCode()} , {$e->getLine()} , {$e->getMessage()}");
            return response('Something bad',500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $user = User::find($id);
            $user->update($request->all());
            Log::info("User updated"); 
            return response()->json(['status'=>true, 'User updated'], 200);

        } catch (Exception $e) {
            Log::critical("Could not update user: {$e->getCode()} , {$e->getLine()} , {$e->getMessage()}");
            return response('Something bad',500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**/
    public function destroy($id)
    {
        try {
            $user = User::find($id);   

            if (!$user){
                return response()->json(['This id doesnt exist'],404);
            }

            $user->delete();
            Log::info("User deleted");
            return response()->json(['status'=>true, 'User deleted'],200);

        } catch (Exception $e) {
            Log::critical("Could not delete user: {$e->getCode()} , {$e->getLine()} , {$e->getMessage()}");
            return response('Something bad',500);
        }
    }
 }
