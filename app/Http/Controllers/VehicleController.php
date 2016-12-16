<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('home')->with(['vehicles' => $vehicles, 'listarvehiculos'=>'true', 'apuntador'=>'vehiculos']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['brand'=>'required', 'model'=>'required']);

        $vehicle = new Vehicle();
        $vehicle->brand = $request->brand;
        $vehicle->model = $request->model;
        $img = $request->file('urlImg');  //$img = $request->urlImg;
        $file_name = time().'_'.$img->getClientOriginalName();

        Storage::disk('imgvehicles')->put($file_name, file_get_contents($img->getRealPath()));

        $vehicle->urlImg = $file_name;

        if ($vehicle->save()){
            return back()->with('succces_msg','Datos guardados');
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
        $vehicle = Vehicle::find($id);
        return view('home')->with(['mostrarvehiculo'=>'true', 'vehicle'=>$vehicle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = Vehicle::find($id);
        return view('home')->with(['edit'=>'true', 'vehicle'=>$vehicle]);
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
        $this->validate($request,['brand'=>'required', 'model'=>'required']);

        $vehicle = Vehicle::find($id);
        $vehicle->brand = $request->brand;
        $vehicle->model = $request->model;
        $img = $request->file('urlImg'); 
        $file_name = time().'_'.$img->getClientOriginalName();

        Storage::disk('imgVehicles')->put($file_name, file_get_contents($img->getRealPath()));
        Storage::disk('imgVehicles')->delete($request->nombreImg);

        $vehicle->urlImg = $file_name;

        if ($vehicle->save()){
            return redirect('home');
        }
        else{
            return back()->with('error_msg','Hubo un error al guardar los datos');
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
        //
    }
}
