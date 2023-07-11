@extends('layouts.app')

@section('template_title')
    {{ $medicamento->name ?? "{{ __('Show') Medicamento" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Medicamento</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('medicamentos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $medicamento->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $medicamento->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Precio Compra:</strong>
                            RD${{ number_format($medicamento->precio_compra,2) }}
                        </div>
                        <div class="form-group">
                            <strong>Precio Venta:</strong>
                            RD${{ number_format($medicamento->precio_venta,2) }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
