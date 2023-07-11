@extends('layouts.app')

@section('template_title')
    {{ $seguimiento->name ?? "{{ __('Show') Seguimiento" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Seguimiento</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('seguimientos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Historial Id:</strong>
                            {{ $seguimiento->historial_id }}
                        </div>
                        <div class="form-group">
                            <strong>Comentario:</strong>
                            {{ $seguimiento->comentario }}
                        </div>
                        <div class="form-group">
                            <strong>Resultado:</strong>
                            {{ $seguimiento->resultado }}
                        </div>
                        <div class="form-group">
                            <strong>Diagnostico Definitivo:</strong>
                            {{ $seguimiento->diagnostico_definitivo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
