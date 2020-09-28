@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('home')}}">Pedidos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Consultar CNPJ</li>
                        <li class="breadcrumb-item active" aria-current="page">Representante: Teste aplicação</li>
                    </ol>
                </nav>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{url('/create-request')}}" method="post" enctype="multipart/form-data" id="form-search-client">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Consultar CNPJ</label>
                            <input type="text" id="cnpj" name="cnpj" class="form-control" placeholder="Exemplo:05159676000146">
                        </div>
                    </div>
                    <button type="submit" data-toggle="modal" data-target="" class="btn btn-primary">
                        Gerar entrada de pedido
                    </button>
                    <a type="button" href="{{url('/home')}}" class="btn btn-danger">
                        Cancelar
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
