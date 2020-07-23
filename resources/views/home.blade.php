@extends('layouts.app')

@section('content')
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
                        <form>
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
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Adicionar Item</label>
                                    <select id="inputEstado" class="form-control">
                                        <option selected disabled>Selecione</option>
                                        <option>Matriz</option>
                                        <option>Filial</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Adicionar</button>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4"></label>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">First</th>
                                            <th scope="col">Last</th>
                                            <th scope="col">Handle</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td colspan="2">Larry the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
