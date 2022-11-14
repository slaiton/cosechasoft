<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productos;

class ProductosController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-productos|crear-productos|editar-productos|borrar-productos', ['only' => ['index']]);
        $this->middleware('permission:crear-productos',['only' => ['create', 'store']]);
        $this->middleware('permission:editar-productos',['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-productos',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $productos = productos::all();
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  \Illuminate\Http\Request  $request, 
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

    public function product_search(Request $request)
    {
        $data = $request->get('query');
        $dataProducts = productos::where("nombre", "LIKE", "%". $data ."%")
        ->orderBy('id_producto', "ASC")
        ->get();
        if(count($dataProducts)>0)
        {
            foreach ($dataProducts as $data) {
                $resp[] = $data->nombre;
            }
        }else{
            $resp[] = "sin datos";
        }

        $respF = array("list" => $resp);

        return response()->json($respF);
    }


    public function product_search_detail(Request $request)
    {
        $data = $request->get('query');
        $dataProducts = productos::where("nombre", "=", "$data")
        ->get();
        if(count($dataProducts)>0)
        {
            foreach ($dataProducts as $data) {
                $resp[] = $data;
            }
        }else{
            $resp = 204;
        }

        $respF = array("data" => $resp);

        return response()->json($respF);
    }
}
