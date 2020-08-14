@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('home')}}">Pedidos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detalhes do pedido</li>
                    </ol>
                </nav>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">CNPJ Cliente</label>
                        <input type="text" class="form-control" id="id-cliente" value="A AEROJET BRASILEIRA DE FIBERGLASS LTDA" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Data pedido</label>
                        <input type="text" class="form-control" id="id-data-pedido" value="20/08/2020" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Local retirada</label>
                        <input type="text" class="form-control" id="id-local-retirada" value="Matriz" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Valor total</label>
                        <input type="text" class="form-control" id="id-valor-total" value="R$200,50" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Data de entrega</label>
                        <input type="text" class="form-control" id="id-data-pedido" value="25/08/2020" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Cond. PGTO</label>
                        <input type="text" class="form-control" id="id-cond-pagamento" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Desconto aplicado</label>
                        <input type="text" class="form-control" id="id-desconto-aplicado" value="10%" disabled>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Frete por conta de</label>
                        <input type="text" class="form-control" id="id-frete-por-conta" value="Cliente" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Valor total</label>
                        <input type="text" class="form-control" id="id-valor-total" value="R$1.000,00" disabled>
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
                                <th scope="col">UM</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Valor un.</th>
                                <th scope="col">Valor un. sugerido</th>
                                <th scope="col">Valor total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">ABC123</th>
                                <td>Bola azul</td>
                                <td>UM</td>
                                <td>10</td>
                                <td>5,30</td>
                                <td><input type="text" class="form-control" id="inputEmail4" value="8,30" disabled></td>
                                <td>80,30</td>

                            </tr>
                            <tr>
                                <th scope="row">ABC123</th>
                                <td>Bola roxa</td>
                                <td>UM</td>
                                <td>10</td>
                                <td>5,30</td>
                                <td><input type="text" class="form-control" id="inputEmail4" value="8,30" disabled></td>
                                <td>80,30</td>

                            </tr>
                            <tr>
                                <th scope="row">ABC123</th>
                                <td>Bola amarela</td>
                                <td>UM</td>
                                <td>10</td>
                                <td>5,30</td>
                                <td><input type="text" class="form-control" id="inputEmail4" value="8,30" disabled></td>
                                <td>80,30</td>

                            </tr>
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
