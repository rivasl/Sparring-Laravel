<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Vehicle;

class UserController extends Controller
{
    static $unoSolo;

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
            // return view('home')->with('succces_msg','Datos guardados');
            $users = User::all();
            return back()->with(['class'=>'success', 'message'=>'Datos guardados', 'users' => $users, 'listar'=>'true', 'apuntador'=>'usuarios']);
        }
        else{
            return back()->with(['class'=>'danger', 'message'=>'Hubo un error al guardar los datos']);
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
        $user = User::find($id);
             
        // vehículos de este usuario
/*        foreach($user->vehiculos as $vehiculo){
            var_dump($vehiculo->brand);
        }*/
        $vehiculos= User::find($id)->vehicles;

        return view('home')->with(['user' => $user, 'vehicles' => $vehiculos, 'mostrar_usuario'=>'true']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('home')->with(['user' => $user, 'edit_usuario'=>'true']);
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
        $this->validate($request,['first_name'=>'required', 'last_name'=>'required', 'email'=>'required', 'twitter'=>'required']);
        $usuario = User::find($id);
        $usuario->first_name = $request->first_name;
        $usuario->last_name = $request->last_name;
        $usuario->email = $request->email;
        $usuario->twitter = $request->twitter;
        $usuario->remember_token = str_random(10);

        if ($usuario->save()){
            // return back()->with('succces_msg','Datos guardados');
            // return view('home')->with('succces_msg','Datos guardados');
            $users = User::all();
            return back()->with(['class'=>'success', 'message'=>'Datos actualizados', 'users' => $users, 'listar'=>'true', 'apuntador'=>'usuarios']);
        }
        else{
            return back()->with(['class'=>'danger', 'message'=>'Hubo un error al actualizar los datos']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if ($user->delete()) {
            return back()->with(['class'=>'success', 'message'=>'Eliminado correctamente!', 'listar'=>'true', 'apuntador'=>'usuarios']);
        }
        else{
            return back()->with(['class'=>'danger', 'message'=>'Hubo un error al eliminar el usuario']);
        }
    }

}
