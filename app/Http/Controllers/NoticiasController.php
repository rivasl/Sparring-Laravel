<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noticia;
use Input;
Use Storage;

class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        $this->validate($request,['titulo'=>'required', 'descripcion'=>'required']);

        $noticia = new Noticia();
        $noticia->titulo = $request->titulo;
        $noticia->descripcion = $request->descripcion;
        $img = $request->file('urlImg');  //$img = $request->urlImg;
        $file_name = time().'_'.$img->getClientOriginalName();

        Storage::disk('imgNoticias')->put($file_name, file_get_contents($img->getRealPath()));

        $noticia->urlImg = $file_name;

		if ($noticia->save()){
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
		$noticia = Noticia::find($id);
		return view('home')->with(['edit'=>'true', 'noticia'=>$noticia]);
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
        $this->validate($request,['titulo'=>'required', 'descripcion'=>'required']);

        $noticia = Noticia::find($id);
        $noticia->titulo = $request->titulo;
        $noticia->descripcion = $request->descripcion;
        $img = $request->file('urlImg'); 
 		$file_name = time().'_'.$img->getClientOriginalName();

        Storage::disk('imgNoticias')->put($file_name, file_get_contents($img->getRealPath()));
        Storage::disk('imgNoticias')->delete($request->nombreImg);

        $noticia->urlImg = $file_name;

		if ($noticia->save()){
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
