@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if(isset($edit))
                        @include('layouts.modificar')
                    @else
                        @if(isset($listar))
                            @include('layouts.users.tablaUsuarios')
                        @else
                           @if(isset($listarvehiculos))
                               @include('layouts.vehicles.tablaVehiculos')
                           @else
                               @if(isset($mostrarvehiculo))
                                   @include('layouts.vehicles.show')  
                               @else
                                   @include('layouts.formulario')
                                   @include('layouts.tabla')
                               @endif
                           @endif   
                        @endif    
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
