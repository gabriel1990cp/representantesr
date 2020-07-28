@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">Entrada de pedido</h5>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Representante</label>
                                <input type="email" class="form-control" id="inputEmail4">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">CNPJ Cliente</label>
                                <input type="email" class="form-control" id="inputEmail4">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Data pedido</label>
                                <input type="date" class="form-control" id="inputEmail4">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Local retirada</label>
                                <select id="inputEstado" class="form-control">
                                    <option selected disabled>Selecione</option>
                                    <option>Matriz</option>
                                    <option>Filial</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Valor total</label>
                                <input type="email" class="form-control" id="inputEmail4">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Data de entrega</label>
                                <input type="date" class="form-control" id="inputEmail4">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Cond. PGTO</label>
                                <input type="text" class="form-control" id="inputEmail4">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Desconto aplicado</label>
                                <input type="text" class="form-control" id="inputEmail4">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputEmail4">Frete por conta de</label>
                                <select id="inputEstado" class="form-control">
                                    <option selected disabled>Selecione</option>
                                    <option>Matriz</option>
                                    <option>Filial</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputEmail4">Data de entrega</label>
                                <input type="date" class="form-control" id="inputEmail4">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputEmail4">Número cliente</label>
                                <input type="number" class="form-control" id="inputEmail4">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputEmail4">Valor total</label>
                                <input type="number" class="form-control" id="inputEmail4">
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Adicionar produto
                        </button>
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
                                        <th scope="col">Ação</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">ABC123</th>
                                        <td>Bola azul</td>
                                        <td>UM</td>
                                        <td>10</td>
                                        <td>5,30</td>
                                        <td><input type="text" class="form-control" id="inputEmail4" value="8,30"></td>
                                        <td>80,30</td>
                                        <td>
                                            <button class="btn btn-danger">Deletar</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">ABC123</th>
                                        <td>Bola roxa</td>
                                        <td>UM</td>
                                        <td>10</td>
                                        <td>5,30</td>
                                        <td><input type="text" class="form-control" id="inputEmail4" value="8,30"></td>
                                        <td>80,30</td>
                                        <td>
                                            <button class="btn btn-danger">Deletar</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">ABC123</th>
                                        <td>Bola amarela</td>
                                        <td>UM</td>
                                        <td>10</td>
                                        <td>5,30</td>
                                        <td><input type="text" class="form-control" id="inputEmail4" value="8,30"></td>
                                        <td>80,30</td>
                                        <td>
                                            <button class="btn btn-danger">Deletar</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Salvar entrada de pedido
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                            Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modal')
@endsection
