@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                    @if(isset($edit)) <!-- modificar noticia -->
                        @include('layouts.modificar')
                    @endif
                    
                    @if(isset($listar)) <!-- Listar usuarios -->
                        @include('layouts.users.tablaUsuarios')
                    @endif
                    
                    @if(isset($apuntador) && $apuntador == 'noticias') <!-- Mostrar noticias y formulario de creación -->
                        @include('layouts.formulario')
                        @include('layouts.tabla')
                    @endif

                    @if(isset($crear_usuario))
                        @include('layouts.users.create')
                    @endif

                    @if(isset($mostrar_usuario))
                        @include('layouts.users.show')
                    @endif

                    @if(isset($edit_usuario))
                        @include('layouts.users.edit')
                    @endif


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

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

                    