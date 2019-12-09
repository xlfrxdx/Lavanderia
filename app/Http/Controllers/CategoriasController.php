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
        return view('categorias.index', compact('Lista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
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
            $categoria = new Categoria;
            $categoria->Nombre = $request->nombre;
            $categoria->Descripcion = $request->descripcion;
            $categoria->save();
            return redirect()->route('categorias.index')->with('info', 'Categoría guardada con éxito');
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
         return view('categorias.edit', compact('categoria'));
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
        $categoria = Categoria::find($id);
        $categoria->Nombre = $request->nombre;
        $categoria->Descripcion = $request->descripcion;
        $categoria->save();
        return redirect()->route('categorias.index')->with('info', 'Categoría editada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::where('id', $id)->delete();       

        // check data deleted or not
        if ($categoria == 1) {
            $success = true;
            $message = "Categoría eliminada con éxito";
        } else {
            $success = false;
            $message = "Error al eliminar categoría";
        }

        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
