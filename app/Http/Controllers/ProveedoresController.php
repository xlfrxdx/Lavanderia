<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Proveedore;
class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedore::paginate();
        //dd($proveedores);
        return view("Index", compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedores.create');
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
            echo('Super EFE');
            return redirect()->route('proveedor.create')->with('info','SUPER EFE');

        }else{
            $proveedor = new \App\Proveedore;
            $proveedor->nombre= $request->get('nombre');
            $proveedor->apellido_p= $request->get('apellido_p');
            $proveedor->apellido_m= $request->get('apellido_m');
            $proveedor->save();
        return redirect()->route('proveedor.index')->with('info','Proveedor guardado con éxito!');
            
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
        
        /*$proveedor= Proveedor::find($id);
        return view(proveedor.detalle, compact('proveedor'));
        
        */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedor = Proveedore::find($id);
        return view('proveedor.editar', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedore $proveedor)
    {
        $proveedor->update($request->all());
        return redirect()->route('proveedor.index', $proveedor->id)->with('info', 'Proveedot actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proveedor = Proveedore::find($id);
        $proveedor->delete();
        
        return back()->with('info', 'Se ha eliminado el procedor');
    }
}
