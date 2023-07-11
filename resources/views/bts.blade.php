@extends('layouts.app')
@section('content')
<style>
    .card {
        border-radius: 4px;
        background: #fff;
        box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
        transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
        cursor: pointer;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-group" style="padding: 50px">
    <div class="card" style="margin-right:5px">
        <img src="{{ asset('doc.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Médicos</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional
                content. This content is a little bit longer.</p>
        </div>
        <div class="card-footer">
            <a href="{{route('medicos.index')}}" class="btn btn-info" style="width: 100%;">Ir <svg
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" style="width: 25px">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                </svg>
            </a>
        </div>
    </div>
    <div class="card" style="margin-right:5px">
        <img src="{{ asset('pac.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Pacientes</h5>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
        </div>
        <div class="card-footer">
            <a href="{{route('pacientes.index')}}" class="btn btn-info" style="width: 100%;">Ir <svg
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" style="width: 25px">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                </svg>
            </a>
        </div>
    </div>
    <div class="card motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2"
        style="margin-right:5px">
        <img src="{{ asset('med.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Medicamentos</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional
                content. This card has even longer content than the first to show that equal height action.</p>
        </div>
        <div class="card-footer">
            <a href="{{route('medicamentos.index')}}" class="btn btn-info" style="width: 100%;">Ir <svg
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" style="width: 25px">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                </svg>
            </a>
        </div>
    </div>
    <div class="card">
        <img src="{{ asset('esp.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Especialidades</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional
                content. This card has even longer content than the first to show that equal height action.</p>
        </div>
        <div class="card-footer">
            <a href="{{route('especialidads.index')}}" class="btn btn-info" style="width: 100%;">Ir <svg
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" style="width: 25px">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                </svg>
            </a>
        </div>
    </div>
</div>
<style>
    .btn:hover {
        border-color: #2e97b7;
        background-color: #2e97b7 !important;
        color: #fff;
    }
</style>
@endsection
