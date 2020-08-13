@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('home')}}">Pedidos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Lista de pedidos</li>
                    </ol>
                </nav>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form>
                    <div class="form-row">
                        <div class="col-4">
                            <label>Data de início</label>
                            <input type="date" class="form-control" placeholder="City">
                        </div>
                        <div class="col-4">
                            <label>Data de início</label>
                            <input type="date" class="form-control" placeholder="State">
                        </div>
                        <div class="col-4">
                            <label>CNPJ</label>
                            <input type="text" class="form-control" placeholder="Zip">
                        </div>
                    </div>
                    <button class="btn btn-primary my-3">Pesquisar</button>
                    <a type="button" class="btn btn-success"  href="{{ url('/create-request') }}">Novo pedido</a>
                </form>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">CNPJ</th>
                        <th scope="col">Data Pedido</th>
                        <th scope="col">Valor total</th>
                        <th scope="col">Data de entrega</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>54.180.024/0001-07</td>
                        <td>12/08/2020</td>
                        <td>R$3.000,10</td>
                        <td>15/08/2020</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>54.180.024/0001-07</td>
                        <td>12/08/2020</td>
                        <td>R$3.000,10</td>
                        <td>15/08/2020</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>54.180.024/0001-07</td>
                        <td>12/08/2020</td>
                        <td>R$3.000,10</td>
                        <td>15/08/2020</td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <nav>
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
@endsection