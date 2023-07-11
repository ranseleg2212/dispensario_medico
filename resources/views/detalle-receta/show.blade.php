@extends('layouts.app')

@section('template_title')
    {{ $detalleReceta->name ?? "{{ __('Show') Detalle Receta" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Detalle Receta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('detalle-recetas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Receta Id:</strong>
                            {{ $detalleReceta->receta_id }}
                        </div>
                        <div class="form-group">
                            <strong>Medicamento Id:</strong>
                            {{ $detalleReceta->medicamento_id }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $detalleReceta->cantidad }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
