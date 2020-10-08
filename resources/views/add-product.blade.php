@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('home')}}">Pedidos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Adicionar produto</li>
                        <li class="breadcrumb-item active" aria-current="page">Representante: Teste aplicação</li>
                    </ol>
                </nav>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="alert alert-secondary" role="alert">
                    <strong>{{session('NameCurrentClient')}} - CNPJ {{session('CNPJCurrentClient')}}</strong>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{url('/search-product')}}" method="post" enctype="multipart/form-data"
                      id="form-search-client">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6"><label for="description-produto">Descrição</label>
                            <input type="text" id="dsc1" class="form-control" name="dsc1">
                        </div>
                        <div class="form-group col-md-6"><label for="inputEmail4">Código</label>
                            <input type="text" id="itm" class="form-control" name="itm">
                        </div>
                    </div>
                    <button type="submit" data-toggle="modal" data-target="" class="btn btn-primary">
                        Pesquisar
                    </button>
                    <a type="button" href="{{url('/home')}}" class="btn btn-danger">
                        Cancelar
                    </a>
                </form>
            </div>
            @isset($resulProduct)
                <div class="form-group col-md-12">
                    <label for="inputEmail4"></label>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Grupo</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($resulProduct as $rowProduct)
                            <tr>
                                <th scope="row">{{$rowProduct->itm}}</th>
                                <td>{{$rowProduct->dsc1}}</td>
                                <td>{{$rowProduct->srp1}}</td>
                                <td><input type="number" name="" id="" class="amount" value="0"></td>
                                <td>
                                    <button class="btn btn-primary btn-add-product">Adicionar</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endisset
        </div>
    </div>
@endsection
