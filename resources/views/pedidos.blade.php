@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">Lista de pedidos</h5>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="form-inline form-search">
                            <label for="staticEmail" class="mb-2 mr-sm-2">Data início</label>
                            <input type="date" class="form-control mb-3 mr-sm-4 col-sm-2" id="inlineFormInputName2"
                                   placeholder="Jane Doe">
                            <label for="staticEmail" class="mb-2 mr-sm-2">Data Fim</label>
                            <input type="date" class="form-control mb-3 mr-sm-4 col-sm-2" id="inlineFormInputName2"
                                   placeholder="Jane Doe">
                            <label for="staticEmail" class="mb-2 mr-sm-2">CNPJ</label>
                            <input type="text" class="form-control mb-3 col-sm-5" id="inlineFormInputName2"
                                   placeholder="Exemplo:91.219.139/0001-86">

                            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="">
                                Realizar consulta
                            </button>
                            <button type="button" class="btn btn-warning mb-3" data-toggle="modal" data-target="">
                                Novo pedido
                            </button>
                            <button type="button" class="btn btn-danger mb-3" data-toggle="modal" data-target="">
                                Cancelar
                            </button>



                        </form>
                        <table class="table table-bordered table-hover">
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
            </div>
        </div>
@endsection
