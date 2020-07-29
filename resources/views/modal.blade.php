<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Descrição</label>
                        <input type="text" class="form-control" id="id-descricao">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Código</label>
                        <input type="text" class="form-control" id="id-codigo">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Grupo</label>
                        <input type="text" class="form-control" id="id-grupo">
                    </div>
                </div>
                <button type="button" class="btn btn-primary">Pesquisar</button>
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
                                <th scope="col">Ação</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">ABC123</th>
                                <td>Bola azul</td>
                                <td>UM</td>
                                <td><input type="number" class="form-control" id="inputEmail4"></td>
                                <td>
                                    <button type="submit" class="btn btn-primary">Adicionar</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">ABC123</th>
                                <td>Bola azul</td>
                                <td>UM</td>
                                <td><input type="number" class="form-control" id="inputEmail4"></td>
                                <td>
                                    <button type="submit" class="btn btn-primary">Adicionar</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">ABC123</th>
                                <td>Bola azul</td>
                                <td>UM</td>
                                <td><input type="number" class="form-control" id="inputEmail4"></td>
                                <td>
                                    <button type="submit" class="btn btn-primary">Adicionar</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>



