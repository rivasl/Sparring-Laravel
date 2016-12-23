<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $users = User::all();
        // $users = User::orderBy('id','DESC')->get();
        // return View::make('users.index')->with('users',$users);
        return view('home')->with(['users' => $users, 'listar'=>'true', 'apuntador'=>'usuarios']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home')->with(['crear_usuario'=>'true', 'apuntador'=>'usuarios']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['first_name'=>'required', 'last_name'=>'required', 'email'=>'required', 'twitter'=>'required', 'password'=>'required']);
        $usuario = new User();
        $usuario->first_name = $request->first_name;
        $usuario->last_name = $request->last_name;
        $usuario->email = $request->email;
        $usuario->twitter = $request->twitter;
        $usuario->password = bcrypt($request->password);
        $usuario->remember_token = str_random(10);

        if ($usuario->save()){
            // return back()->with('succces_msg','Datos guardados');
            return view('home')->with('succces_msg','Datos guardados');
        }
        else{
            return back()->with('error_msg','Hubo un error al guardar los datos');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
