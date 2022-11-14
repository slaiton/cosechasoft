@extends('layouts.user')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="mt-4 col-lg-6">
            <div class="d-md-flex flex-md-row-reverse align-items-center justify-content-between">
                @can('ver-orden-compra')
                <a class="btn btn-primary" href="{{ url("ordenCompra") }}"> Ver Ordenes </a>
                @endcan
                <h1 class="bd-title"> Nueva Orden de Compra </h1>
            </div>
        </div>

        <div class="mt-5 col-lg-8">

            <form method="POST" class="newOrden">

                @csrf
                <input type="hidden" name="fecha_creacion" value="{{ date("Y-m-d") }}">
                <div class="row g-3">
                    <div class="col-md-6">
                        <select class="form-select form-select-lg" name="id_proveedor">
                            <option selected>Proveedor: </option>
                            @foreach ($proveedores as $proveedor)

                            <option value="{{ $proveedor->id_proveedor }}">{{ $proveedor->nombre }}</option>
                                
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select class="form-select form-select-lg" name="id_bodega_destino">
                            <option value="" selected>Bodega: </option>
                            @foreach ($bodegas as $bodega)

                            <option value="{{ $bodega->id_bodega }}">{{ $bodega->nombre }}</option>
                                
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row g-3 mt-3">
                    <div class="col">
                        <input type="text" class="form-control form-control-lg" name="fecha_entrega"  onfocus="(this.type='date')"  onblur="(this.type='text')" placeholder="Fecha Entrega"> 
                    </div>
                    <div class="col">
                        <div class="input-group input-group-lg md-6">
                            <span class="input-group-text">COL $</span>
                            <input type="text" class="form-control form-control-lg" id="valor_total" name="valor_total" aria-label="Valor" placeholder="Valor Total" readonly>
                         </div>
                    </div>
                </div>

                <div class="row g-3 mt-3">
                    <table class="table table-lg">
                        <thead>
                            <tr>
                                <th>Cantidad</th>
                                <th>Producto</th>
                                <th>Valor</th>
                                <th>Unidades</th>
                                <th>Descripcion</th>
                                <th>Opciones</th>
                            </tr>

                            <input type="hidden" id="totalDetalles" name="totalDetalles" value="1">

                            <tbody id="contDetalle">
                                <tr>
                                    <td>
                                        <input type="number" class="form-control form-control-lg cantidades cantidad0" id="0" name="cantidad0" placeholder="Cantidad">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-lg autocomplete producto0" id="0" name="producto0" placeholder="Producuto">
                                        <input type="hidden" class="id_producto0" id="0" name="id_producto0">
                                        
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-lg autocomplete precio0" id="0" name="precio0" placeholder="Precio" readonly>
                                        
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-lg autocomplete unidad0" id="0" name="unidad0" placeholder="Unidad" readonly>
                                        
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-lg autocomplete descripcion0" id="0" name="descripcion0" placeholder="Descripcion">

                                    </td>
                                    <td>

                                        <a class="btn btn-success addDetalle" id="0">+</a>

                                    </td>
                    
                                </tr>
                            </tbody>

                            <td colspan=5><h3 id="valor_totalx" style="text-align:end;">Total: $</h3></td>

                        </thead>

                    </table>

                </div>

                <input type="submit" class="mt-4 btn btn-success" value="Guardar" on>
            </form>

        </div>

    </div>


</div>

{{-- {{ dd(session()) }} --}}


<script type="text/javascript">


$(document).on('submit', '.newOrden', function(e){

    e.preventDefault();
    // console.log(new FormData(this))
    var route  = "{{ route('ordenCompra.store') }}";

    $.ajax({
    "data": new FormData(this),
    "type":"POST",
    "url": route,
    "contentType": false,
    "cache": false,
    "processData":false,
    beforeSend: function () {
    //   $('.response').html("Procesando solicitud");
   },
    success: function (response) {

        if(response['code'] == 200)
        {
            alert(response["data"]);
            window.location = "{{ route('ordenCompra.index') }}";
        }

    }
  });



});


var dataFinal = "";

$(document).on('keypress', '.autocomplete' , function(){
    var route = "{{ url('product_search') }}";
    var search = $(this).val();
    var parm_search = $(this).attr('id');
    if (search.length > 2) {
        $('.producto'+parm_search).typeahead({
            source: function (query, process) {
                return $.get(route, {
                    query: query
                }, function (data) {
                    dataFinal = data["data"];
                    return process(data["list"]);
                });
            }
        });        
    }
  });


$(document).on('blur', '.autocomplete', function(){
    refreshPriceforProduct($(this).attr('id'));
    refreshValorTotal();
});

$(document).on('blur', '.cantidades', function(){
    if($(".precio"+$(this).attr('id')).val() != 0 && $(".precio"+$(this).attr('id')).val() != "")
    {
        refreshPriceforProduct($(this).attr('id'));
        // refreshValorTotal();
    }
});


$(document).on('click', ".addDetalle", function(){

    refreshValorTotal();


    var container = $("#contDetalle");
    var totalDetalles = $("#totalDetalles");
    var nuevototal = Number(totalDetalles.val())+1;
    totalDetalles.val(nuevototal);

    nuevototal = nuevototal-1;

    var obj = "";
    // obj +=  '<div id="detalle'+nuevototal+'">';
    obj +=  '   <tr id="detalle'+nuevototal+'">';
    obj +=  '       <td>';
    obj +=  '           <input type="number" class="form-control form-control-lg cantidades cantidad'+nuevototal+'" id="'+nuevototal+'" name="cantidad'+nuevototal+'" placeholder="Cantidad">';
    obj +=  '       </td>';
    obj +=  '       <td>';
    obj +=  '           <input type="text" class="form-control form-control-lg autocomplete producto'+nuevototal+'" id="'+nuevototal+'" name="producto'+nuevototal+'" placeholder="Producuto">';
    obj +=  '           <input type="hidden" class="id_producto'+nuevototal+'" id="'+nuevototal+'" name="id_producto'+nuevototal+'">';
    obj +=  '       </td>';
    obj +=  '       <td>';
    obj +=  '           <input type="text" class="form-control form-control-lg  precio'+nuevototal+'" id="'+nuevototal+'" name="precio'+nuevototal+'" placeholder="Precio" disabled>';
    obj +=  '       </td>';
    obj +=  '       <td>';
    obj +=  '           <input type="text" class="form-control form-control-lg  unidad'+nuevototal+'" id="'+nuevototal+'" name="unidad'+nuevototal+'" placeholder="Unidad" disabled>';
    obj +=  '       </td>';
    obj +=  '       <td>';
    obj +=  '           <input type="text" class="form-control form-control-lg autocomplete descripcion'+nuevototal+'" id="'+nuevototal+'" name="descripcion'+nuevototal+'" placeholder="Descripcion">';
    obj +=  '       </td>';
    obj +=  '       <td>';
    obj +=  '           <a class="btn btn-success addDetalle" id="'+nuevototal+'">+</a>';
    obj +=  '       </td>';
    obj +=  '   </tr>';
    // obj +=  ' </div>';

    container.append(obj);
   
});

function refreshValorTotal()
{
    var valor_total = $("#valor_total");
    var valor_totalx = $("#valor_totalx");
    var totalDetalles = $("#totalDetalles").val();
    valor_total.val("");
    var total = 0;

    for (let index = 0; index < totalDetalles; index++) {
        var element2 = ".precio"+index;
        var valor_unitario = $(element2);
        console.log(valor_unitario.val());
      total = Number(total);
      total += Number(valor_unitario.val());
      console.log(total);
    }

    valor_total.val(total);
    valor_totalx.html("Total: $ "+total);
}

function refreshPriceforProduct(index)
{
  var route = "{{ url('product_search_detail') }}";
  const valor_total = $("#valor_total");

  var total = "";
  

    var element = ".producto"+index;
    var element1 = ".id_producto"+index;
    var element2 = ".precio"+index;
    var element3 = ".cantidad"+index;
    var element4 = ".unidad"+index;

    var valor_unitario = $(element2);
    var cantidad = $(element3).val();

    if(cantidad.length < 1)
    {
        // alert("Cantidad Necesaria");
        $(element3).focus();
        return;
    }

    var unidad = $(element4);
    var id_producto = $(element1);
    var search = $(element).val();

  $.ajax({
    url: route,
    type: "GET",
    data: {query:search},
    success: function(data){
        // console.log(data);
        if(data["data"] == 204)
        {
            // valor_unitario.val(0);

        }else{
            
            var precio = Number(data["data"][0]["valor"])*cantidad;
            valor_unitario.val(precio);
            unidad.val(data["data"][0]["unidad_medida"]);
            id_producto.val(data["data"][0]["id_producto"]);
        }
      }
   });

  
}

</script>




@endsection