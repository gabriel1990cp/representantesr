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
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Descrição</label>
                        <input type="text" class="form-control" id="id-descricao">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Código</label>
                        <input type="text" class="form-control" id="id-codigo">
                    </div>
                </div>
                <button type="button" class="btn btn-primary" id="btn-pesquisar-produto">Pesquisar</button>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4"></label>
                        <table class="table table-bordered" id="products-table">
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
                                <td>12595</td>
                                <td>BALAO 3 LISO BASIC C/100 VM</td>
                                <td>1</td>
                                <td>0</td>
                                <td>
                                    <button type="button" class="btn btn-primary valicacao-cliente">Adicionar</button>
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
