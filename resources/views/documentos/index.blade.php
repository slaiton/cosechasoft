@extends('layouts.user')

@section('content')

<div class="container-fluid">

   <div class="row justify-content-center">
       <div class="col-md-8 col-xl-8 mb-4">
           <h2>Documentos</h2>
       </div>
   </div>

        <div class="row justify-content-center">
          <div class="col-md-8 d-flex">

            <div class="col-md-3 col-xl-3" style="margin-left:10px;">                
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Documentacion Software
                        </h4>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary"> <a href="https://capitalb.s3.amazonaws.com/COSECHAS/COS-COL-DOCUMENTACION-COSECHASOFT.odt" class="btn btn-primary" target="_blank">Ver mas</a> </button>
                    </div>
                </div>
            </div>


            <div class="col-md-3 col-xl-3" style="margin-left:10px;">                
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Documentacion crentro de acopio
                        </h4>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary"> <a href="https://capitalb.s3.amazonaws.com/COSECHAS/COS-COL-PROCESOS-CENTRO+DE+ACOPIO.odt" class="btn btn-primary" target="_blank">Ver mas</a> </button>
                    </div>
                </div>
            </div>


            <div class="col-md-3 col-xl-3" style="margin-left:10px;">                
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Documentacion de Capacitacion
                        </h4>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary"> <a href="https://capitalb.s3.amazonaws.com/COSECHAS/COS-COL-CAPACITACION-COSECHASOFT.odt" class="btn btn-primary" target="_blank">Ver mas</a> </button>
                    </div>
                 </div>
              </div>


            </div>




        </div>
    </div>
{{-- </div> --}}

@endsection
