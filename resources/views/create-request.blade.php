@extends('layouts.app')
@section('content')
    <div class="container">
        <meta name="_token" content="{{ csrf_token() }}">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('home')}}">Pedidos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Entrada de pedidos</li>
                        <li class="breadcrumb-item active" aria-current="page">Representante: Teste aplicação</li>
                    </ol>
                </nav>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="alert alert-secondary" role="alert">
                    <strong>{{$client->alph}} - CNPJ {{$client->tax}}</strong>
                </div>
                <div role="alert" class="alert alert-danger alert-create-request" style="display: none;"></div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{url('/save-order')}}" method="POST" enctype="multipart/form-data"
                      id="form-save-request" class="form-save-request">
                    @csrf
                    <div class="form-row">
                        <input name="idCliente" id="idCliente" type="hidden" value="{{$client->idCliente}}">
                        <input name="tax" id="tax" type="hidden" value="{{$client->tax}}">
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">Data pedido</label>
                            <input name="drqj" id="drqj" type="text" class="form-control" value="{{date('d/m/Y')}}"
                                   disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">Local retirada</label>
                            <select name="mcu" id="mcu" class="form-control">
                                <option selected disabled>Selecione</option>
                                <option value="matriz">Matriz</option>
                                <option value="filial">Filial</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">Valor total</label>
                            <input name="aexp" id="aexp" type="text" class="form-control" disabled value="0">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">Retirada Programada</label>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">Data de entrada do pedido</label>
                            <input id="pddj" name="pddj" type="date" class="form-control" id="pddj" name="pddj"
                                   value="{{date('Y-m-d')}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">Cond. PGTO</label>
                            <input id="ptc" name="ptc" type="text" class="form-control" value="{{$client->trar}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">Desconto aplicado</label>
                            <input id="ky" name="ky" type="text" class="form-control" placeholder="Digite 18 para representar 18%">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">Frete por conta de</label>
                            <select id="frth" name="frth" class="form-control">
                                <option selected disabled>Selecione</option>
                                <option value="cif_cliente">CIF (Cliente)</option>
                                <option value="fob_fornecedor">FOB (Fornecedor)</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">Transportadora</label>
                            <select id="AN83" name="AN83" class="form-control">
                                <option selected disabled>Selecione</option>
                                @isset($carries)
                                    @foreach($carries as $carrie)
                                        <option value="{{$carrie->an8}}">$carrie->alph</option>
                                    @endforeach
                                @endisset
                            </select>
                        </div>
                        <div class="form-group col-md-9">
                            <label for="inputEmail4">Ordem de compra</label>
                            <input id="AA20" name="AA20" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="exampleFormControlTextarea1">Observação</label>
                            <textarea id="Observacao" name="Observacao" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <button type="button" data-toggle="modal" data-target="#addProductModal" class="btn btn-primary">
                        Adicionar produto
                    </button>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4"></label>
                            <table class="table table-bordered" id="products-cnpj">
                                <thead>
                                <tr>
                                    <th scope="col">Cod</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Grupo</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col">Valor un.</th>
                                    <th scope="col">Valor un. sugerido</th>
                                    <th scope="col">Valor total</th>
                                    <th scope="col">Ação</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary save-request">
                        Salvar entrada de pedido
                    </button>
                    <button type="button" class="btn btn-secondary precificacao" data-toggle="modal" data-target="">
                        Precificação
                    </button>
                    <a type="button" class="btn btn-danger" href="{{ url('/home') }}">
                        Cancelar
                    </a>
                </form>
            </div>
        </div>
    </div>
    @include('modal')
@endsection

