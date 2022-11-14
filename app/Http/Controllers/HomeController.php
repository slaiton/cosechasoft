<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orden_compra;
use App\Models\User;
use App\Models\productos;
use Illuminate\Support\Facades\DB;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $users = User::all();
        $productos = productos::all();

        $sel = DB::raw("orden_compras.id_orden, p.nombre as nombre_proveedor, orden_compras.fecha_creacion,
                        orden_compras.fecha_estimada, orden_compras.valor_total, b.nombre as nombre_bodega_destino, 
                        b.direccion as dir_bodega,b.ciudad as ciudad_bodega");
        $orden_compra = Orden_compra::select($sel)
        ->join("proveedores as p", "p.id_proveedor", "=", "orden_compras.id_proveedor")
        ->join("bodegas as b", "b.id_bodega", "=", "orden_compras.id_bodega_destino")
        ->get();
        return view('home', compact('orden_compra', 'users', 'productos'));
    }
}
