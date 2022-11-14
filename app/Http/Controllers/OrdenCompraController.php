<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orden_compra;
use App\Models\proveedores;
use App\Models\bodegas;
use App\Models\detalle_orden_compra;
use Illuminate\Support\Facades\DB;

class OrdenCompraController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-orden-compra|crear-orden-compra|editar-orden-compra|borrar-orden-compra', ['only' => ['index']]);
        $this->middleware('permission:crear-orden-compra',['only' => ['create', 'store']]);
        $this->middleware('permission:editar-orden-compra',['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-orden-compra',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sel = DB::raw("orden_compras.id_orden, p.nombre as nombre_proveedor, orden_compras.fecha_creacion,
                        orden_compras.fecha_estimada, orden_compras.valor_total, b.nombre as nombre_bodega_destino, 
                        b.direccion as dir_bodega,b.ciudad as ciudad_bodega");
        $orden_compra = Orden_compra::select($sel)
        ->join("proveedores as p", "p.id_proveedor", "=", "orden_compras.id_proveedor")
        ->join("bodegas as b", "b.id_bodega", "=", "orden_compras.id_bodega_destino")
        ->get();
        $proveedores = proveedores::all();
        $bodegas = bodegas::all();

        return view('ordenCompra.index', compact('orden_compra', 'proveedores', 'bodegas'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores = proveedores::all();
        $bodegas = bodegas::all();

        return view('ordenCompra.create', compact('proveedores', 'bodegas'));
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

            // request()->validate(orden_compras::$rules);
            // $orden = orden_compras::create($request->all());
            
        $data = $request->all();

        // print_r($data);

        // echo $data[id_proveedor];
        $arrayInsert = [
            // "id_orden" => NULL,
            "id_proveedor" => $data['id_proveedor'],
            "valor_total" => $data['valor_total'],
            "fecha_creacion" => $data['fecha_creacion'],
            "id_bodega_destino" => $data['id_bodega_destino'],
            "fecha_estimada" => $data['fecha_entrega'],
            "usuario_creacion" => 1
        ];

        
        $insertOrden = Orden_compra::insertGetId($arrayInsert);
        
        $totalDetallles = $data['totalDetalles'];
        $id_orden = $insertOrden;
        
        for ($i=0; $i < $totalDetallles; $i++) { 
            $cantidad = $data['cantidad'.$i];
            $producto = $data['producto'.$i];
            $id_producto = $data['id_producto'.$i];
            // $precio = $data->precio.$i;
            // $unidad = $data->unidad.$i;
            $descripcion = $data['descripcion'.$i];
            
            $insertdetalle = detalle_orden_compra::insert([
                "id_orden" => $id_orden,
                "cantidad" => $cantidad,
                "id_producto" => $id_producto,
                "descripcion" => $descripcion
            ]);
        }

        return array("data" => "Datos guardados con exito", "code" => 200);
        
      } catch (\Throwable $th) {

        return array("data" => $th, "code" => 400);
         
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
        $sel = DB::raw("orden_compras.id_orden, p.nombre as nombre_proveedor, orden_compras.fecha_creacion,
                        orden_compras.fecha_estimada, orden_compras.valor_total, b.nombre as nombre_bodega_destino, 
                        b.direccion as dir_bodega,b.ciudad as ciudad_bodega, u.name as usuario");
        $orden_compra = Orden_compra::select($sel)
                        ->join("proveedores as p", "p.id_proveedor", "=", "orden_compras.id_proveedor")
                        ->join("bodegas as b", "b.id_bodega", "=", "orden_compras.id_bodega_destino")
                        ->join("users as u", "u.id", "=", "orden_compras.usuario_creacion")
                        ->where("orden_compras.id_orden", $id)
                        ->firstOrFail();

        $seldetalle = DB::raw("detalle_orden_compras.cantidad, p.nombre as producto, p.valor as precio_producto, 
                              p.unidad_medida, detalle_orden_compras.descripcion");

        $detalle_orden_compra = detalle_orden_compra::select($seldetalle)
                                ->join("productos as p", "p.id_producto", "=", "detalle_orden_compras.id_producto")
                                ->where("detalle_orden_compras.id_orden", $id)
                                ->get();

      return view('ordenCompra.show', compact('orden_compra', 'detalle_orden_compra'));

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

    public function rules()
    {
        return [
            'id_proveedor'=>'required',
            'id_bodega_destino'=>'required',
            'fecha_entrega'=>'required'
        ];
    }
}
