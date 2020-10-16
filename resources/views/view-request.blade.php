@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('home')}}">Pedidos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detalhes do pedido</li>
                        <li class="breadcrumb-item active" aria-current="page">Representante: Teste aplicação</li>
                    </ol>
                </nav>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="alert alert-secondary" role="alert">
                    <strong>{{$request['client']->alph}} - CNPJ {{$request['client']->tax}}</strong>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Data pedido</label>
                        <input type="text" class="form-control" value="{{date('d/m/Y', strtotime($request->drqj))}}" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Local retirada</label>
                        <input type="text" class="form-control" value="{{$request->mcu}}" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Valor total</label>
                        <input type="text" class="form-control" value="{{$request->aexp}}" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Retirada Programada</label>
                        <input type="text" class="form-control" id="id-data-pedido" value="{{date('d/m/Y', strtotime($request->pddj))}}"  disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Data de entrada do pedido</label>
                        <input  type="text" class="form-control" value="{{date('d/m/Y', strtotime($request->pddj))}}" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Cond. PGTO</label>
                        <input type="text" class="form-control" value="{{$request->ptc}}" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Desconto aplicado</label>
                        <input type="text" class="form-control" value="{{$request->ky}}%" disabled>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Frete por conta de</label>
                        <input type="text" class="form-control" value="{{$request->frth}}" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Transportadora</label>
                        <input type="text" class="form-control" value="{{$request->AN83}}" disabled>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="inputEmail4">Ordem de compra</label>
                        <input type="text" class="form-control" value="{{$request->AA20}}" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="exampleFormControlTextarea1">Observação</label>
                        <textarea class="form-control" disabled rows="5">{{$request->Observacao}}</textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4"></label>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Cod</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Grupo</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Valor un.</th>
                                <th scope="col">Valor un. sugerido</th>
                                <th scope="col">Valor total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($request['items'] as $item)
                            <tr>
                                    <th scope="row">{{$item->itm}}</th>
                                    <td>{{$item->dsc1}}</td>
                                    <td>{{$item->srp1}}</td>
                                    <td>{{$item->uorg}}</td>
                                    <td>{{$item->aexp}}</td>
                                    <td>{{$item->uprc}}</td>
                                    <td>{{number_format($item->amount, 2)}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <a type="button" class="btn btn-danger" href="{{ url('/home') }}">
                    Cancelar
                </a>
            </div>
        </div>
    </div>
    @include('modal')
@endsection
