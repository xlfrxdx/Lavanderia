<?php

namespace App\Http\Controllers;
use \App\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Lista = Categoria::paginate();
        return view('categoria.index', compact('Lista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request == null){
            echo('Super f xddd');
            return view('categorias.create');
        }else{
            $categoria = new \App\Categoria;
            $categoria->nombre = $request->get('nombre');
            $categoria->descripcion = $request-get('descripcion');
            $categoria->saved();
            return redirect()->route('categoria.index')->with('info', 'Categoria guardada cone éxito');
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
        /*$categoria = Categoria::find($id);
         return view('categoria.detalle', compact('categoria'));*/

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);
         return view('categoria.editar', compact('categoria'));
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
        $categoria = \App\Categoria::find($id);
        $categoria->nombre = $request->get('nombre');
        $categoria->descripcion = $request->get('descripcion');
        $categoria->save();
        return redirect()->route('categoria.index')->with('info', 'Categoria guardado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $categoria = \App\Categoria::find($id);
            $categoria->delete();
            return redirect()->route('categoria.index')->with('info', 'Categoria se ha elimina con éxito');


    }
}
