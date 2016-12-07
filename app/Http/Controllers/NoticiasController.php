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
        // dd($request);

        $noticia = new Noticia();
        $noticia->titulo = $request->titulo;
        $noticia->descripcion = $request->descripcion;
        $img = $request->file('urlImg');  //$img = $request->urlImg;
        $file_name = time().'_'.$img->getClientOriginalName();

/*echo "request->urlImg: ".$request->urlImg."<br><br>";        
echo "<br><br>file_name : ".$file_name."<br><br>";
$path = $request->urlImg->path();
echo "<br><br>path : ".$path."<br><br>";
var_dump($img);
*/

        Storage::disk('imgNoticias')->put($file_name, file_get_contents($img->getRealPath()));

        $noticia->urlImg = $file_name;

        $noticia->save();
        dd('Datos guardados!');
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
